<?php

require_once( 'lib/Article.php' );

class ArticleTest extends PHPUnit_Framework_TestCase {

  public function testConstructor() {
    $article = new Article( [ 'title' => 'Birds', 'revision_id' => '444' ] );
    $this->assertEquals( $article->title, 'Birds' );
    $this->assertEquals( $article->revision_id, 444 );
  }

  public function testFindByTitle() {
    $this->assertEquals( Article::find_by_title( ' ' ), null );
    $this->assertEquals( Article::find_by_title( 'Main' ), null );
    $this->assertEquals( get_class(Article::find_by_title( 'Latest_plane_crash' )), 'Article' );
    $this->assertEquals( get_class(Article::find_by_title( 'Latest plane crash' )), 'Article' );
  }

  public function testArticlePathStatic() {
    $this->assertEquals( Article::article_path_static( 'Birds' ), 'articles/Birds.json' );
  }

  public function testArticlePath() {
    $article = new Article( [ 'title' => 'Birds' ] );
    $this->assertEquals( $article->article_path(), 'articles/Birds.json' );
  }

}

?>
