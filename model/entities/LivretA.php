<?php
/**
 *
 */
class LivretA extends Account
{
  private static $taux=0.075;


  /**
   *  return the value taux
   * @return int taux
   */
  public static function getTaux(){
    return self::$taux;
  }
}

 ?>
