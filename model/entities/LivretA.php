<?php
/**
 *
 */
class LivretA extends Account
{
  private static $taux=0.075;

  /**
   * [setTaux description]
   */
  public static function setTaux(){
    $this->taux = SELF::$taux;
  }

  /**
   *  return the value taux
   * @return int taux
   */
  public function getTaux(){
    return $this->taux;
  }
}

 ?>
