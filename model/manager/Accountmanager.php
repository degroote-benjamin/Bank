<?php
/**
 *
 */
class Accountmanager
{

  private $db; // Instance de PDO
  public function __construct($db)
  {
      $this->setDb($db);
  }
  // setter //
  public function setDb(PDO $db)
  {
      $this->db = $db;
  }

  public function insertGeneral($account){
    $q = $this->db->prepare('INSERT INTO Account set id_user = :id_user , amount=:amount , type=:type');
    $q->bindValue(':id_user',$this->db->lastInsertId());
    $q->bindValue(':amount',$account->getAmount());
    $q->bindValue(':type',$account->getType());
    $q->execute();
  }


}

 ?>
