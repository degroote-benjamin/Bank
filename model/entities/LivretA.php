<?php
/**
 *
 */
class LivretA extends Account
{
  private $taux=0.75;

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
