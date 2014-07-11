<?php

class Article {

  /**
   * Creates an instance of Article and sets properties based on a hash
   *
   * @param array $json The hash to be turned into instance properties
   * @return null
   */
  function __construct( $json ) {
    foreach( $json as $attr => $val ) {
      $this->$attr = $val;
    }
  }

  /**
   * Looks up an article by title, and returns an instance of Article
   * if found, otherwise returns null
   *
   * @param string $title The title of the article to lookup
   * @return null or Article
   */
  public static function find_by_title( $title ) {
    $article_path = self::article_path_static( $title );
    if( file_exists( $article_path ) ) {
      $object = json_decode( file_get_contents( $article_path ) );
      return new Article( $object );
    } else {
      return null;
    }
  }

  /**
   * Returns the relative path of the Article's JSON file
   *
   * @param string $title The title of the article to lookup
   * @return string
   */
  public static function article_path_static( $title ) {
    return 'articles/' . str_replace( ' ', '_', $title ) . '.json';
  }

  /**
   * Instance method to get the relative path of this Article's JSON file
   *
   * @return string
   */
  public function article_path( ) {
    return self::article_path_static( $this->title );
  }

  /**
   * Replaces the article HTML content with $content and updates its JSON file
   *
   * @param string $content The new HTML content of the article
   * @return null
   */
  public function update_content( $content ) {
    $this->content = $content;
    $this->revision_id += 1;
    $this->save( );
  }

  /**
   * Updates the article's JSON file when it is OK to do so
   *
   * @return null
   */
  private function save( ) {
    $lock_file_path = $this->article_path( ) . ".lock";
    // sleep in short bursts while waiting for a lock to be released
    do {
      usleep( 5 );
    } while( file_exists( $lock_file_path ) );

    // create a lock file to prevent other threads from attempting to write
    touch( $lock_file_path );
    $this->write_JSON( );
    // destroy the lock file
    unlink( $lock_file_path );
  }

  /**
   * Perform the actual writing of the JSON file on disk
   *
   * @return null
   */
  private function write_JSON( ) {
    $json = json_encode( $this );
    $FILE = fopen( $this->article_path( ), 'w+' );
    fwrite( $FILE, $json );
    fclose( $FILE );
  }

}

?>
