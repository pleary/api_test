<?php

header( 'Content-Type: application/json' );

require_once( 'lib/Article.php' );
require_once( 'lib/ArticleCache.php' );
require_once( 'lib/Fibonacci.php' );

$method = isset( $_REQUEST['method'] ) ? $_REQUEST['method'] : null;
$title = isset( $_REQUEST['title'] ) ? $_REQUEST['title'] : null;
$content = isset( $_REQUEST['content'] ) ? $_REQUEST['content'] : null;

/**
 *
 * Main API logic
 *
 */
if( $method == 'show' ) {

  if( $article = lookupArticle( $title ) ) {
    Fibonacci::at_position( 34 );
    echo json_encode( $article );
  }

} elseif( $method == 'save' ) {

  if( $article = lookupArticle( $title ) ) {
    if( $content ) {
      $article->update_content( $content );
      ArticleCache::set_by_title( $title, $article );
      echo json_encode( $article );
    } else {
      fail( 'Missing required parameter: \'content\'' );
    }
  }

} else {

  fail( 'Invalid method: \'' . $method . '\'' );

}




/**
 *
 * Helper Functions
 *
 */

function lookupArticle( $title ) {
  if( $article = ArticleCache::find_by_title( $title ) ) {
    return $article;
  }
  if( $article = Article::find_by_title( $title ) ) {
    ArticleCache::set_by_title( $title, $article );
    return $article;
  } else {
    fail( 'Invalid title' );
  }
}

function fail( $message ) {
  echo json_encode( array( 'error' => $message ) );
}

?>