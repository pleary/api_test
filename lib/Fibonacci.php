<?php

class Fibonacci {

  /**
   * Returns the number in the Fibonacci sequence at position $position
   *
   * @param int $position The position in the Fibonacci sequence to return
   * @return int
   */
  public static function at_position( $position ) {
    if( ! is_int( $position ) || $position < 1 ) return null;
    if( $position <= 2 ) return 1;
    $sequence = self::sequence( $position );
    return $sequence[ $position - 1 ];
    
    // alternate (slower) method that creates a lot of duplicate calls
    // return self::at_position( $position - 2 ) +
    //        self::at_position( $position - 1 );
  }

  /**
   * Returns an array of the first $length Fibonacci numbers
   *
   * @param int $length The number of entries in the Fibonacci sequence to return
   * @return array
   */
  public static function sequence( $length ) {
    if( ! is_int( $length ) || $length < 1 ) return null;
    if( $length == 1 ) return [ 1 ];
    if( $length == 2 ) return [ 1, 1 ];
    $sequence = self::sequence( $length - 1 );
    $sequence[] = $sequence[ $length - 2 ] + $sequence[ $length - 3 ];
    return $sequence;
  }

}

?>
