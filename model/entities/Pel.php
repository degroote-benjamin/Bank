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

  public function diff($date){
    $datetime1 = new DateTime($date->getDate());
    $datetime2 = new DateTime(date("Y-m-d"));
    $interval = $datetime1->diff($datetime2);
    return $interval->format('%a');
  }
}

 ?>
