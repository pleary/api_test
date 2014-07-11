<?php

require_once( 'lib/Fibonacci.php' );

class FibonacciTest extends PHPUnit_Framework_TestCase {

  public function testAtPosition() {
    $this->assertEquals( Fibonacci::at_position( 'sadf' ), null );
    $this->assertEquals( Fibonacci::at_position( 0 ), null );
    $this->assertEquals( Fibonacci::at_position( 1 ), 1 );
    $this->assertEquals( Fibonacci::at_position( 2 ), 1 );
    $this->assertEquals( Fibonacci::at_position( 3 ), 2 );
    $this->assertEquals( Fibonacci::at_position( 4 ), 3 );
    $this->assertEquals( Fibonacci::at_position( 5 ), 5 );
    $this->assertEquals( Fibonacci::at_position( 6 ), 8 );
    $this->assertEquals( Fibonacci::at_position( 7 ), 13 );
  }

  public function testSequence() {
    $this->assertEquals( Fibonacci::sequence( 'sadf' ), null );
    $this->assertEquals( Fibonacci::sequence( 0 ), null );
    $this->assertEquals( Fibonacci::sequence( 1 ), [ 1 ] );
    $this->assertEquals( Fibonacci::sequence( 2 ), [ 1, 1 ] );
    $this->assertEquals( Fibonacci::sequence( 3 ), [ 1, 1, 2 ] );
    $this->assertEquals( Fibonacci::sequence( 4 ), [ 1, 1, 2, 3 ] );
    $this->assertEquals( Fibonacci::sequence( 5 ), [ 1, 1, 2, 3, 5 ] );
    $this->assertEquals( Fibonacci::sequence( 6 ), [ 1, 1, 2, 3, 5, 8 ] );
    $this->assertEquals( Fibonacci::sequence( 7 ), [ 1, 1, 2, 3, 5, 8, 13 ] );
  }

}

?>
