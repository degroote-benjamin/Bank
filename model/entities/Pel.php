<?php
/**
 *
 */
class Pel extends Account
{
  private $date;

  /**
   * return value date
   * @return date $this->date
   */
  public function getDate(){
    return $this->date;
  }

  /**
   * set value date
   * @param date $date
   */
  public function setDate($date){
    $this->date = $date;
  }
}

 ?>
