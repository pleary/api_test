<?php

$ARTICLE_CACHE = array();

class ArticleCache {

  /**
   * Check the cache of articles by title
   *
   * @param string $title The title of the article to cache
   * @return null
   */
  public static function find_by_title( $title ) {
    if( isset( $ARTICLE_CACHE[ $title ] ) ) {
      return $ARTICLE_CACHE[ $title ];
    }
  }

  /**
   * Update some cache of articles by title
   *
   * @param string $title The title of the article to cache
   * @return null
   */
  public static function set_by_title( $title, $object ) {
    $ARTICLE_CACHE[ $title ] = $object;
  }

}

?>
