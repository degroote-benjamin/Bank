<?php
/**
 *
 */
class LivretA extends Account
{
  private $taux;

  /**
   * [setTaux description]
   */
  public static function setTaux(){
    $this->taux = 0.75;
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
