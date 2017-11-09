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

  public function getList($id){
    $q = $this->db->prepare('SELECT type,id_account,id_user,amount FROM Account where id_user = :id');
    $q->bindValue(':id',$id->getIdUser());
    $q->execute();
    $q->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'General',array(array('type','id_account','id_user','amount')));
    return $q->fetchAll();
  }

  public function add($account){
    $q= $this->db->prepare('INSERT INTO Account SET type = :type , taux = :taux , date = :date , id_user = :id , amount = :amount');
    $q->bindValue(':type',$account->getType());
    $q->bindValue(':amount',$account->getAmount());
    $q->bindValue(':id',$account->getIdUser());

    if($account->getType() == "Pel"){
      $q->bindValue(':date',NOW());
    }
    else {
      $q->bindValue(':date',NULL);
    }

    if($account->getType() == "LivretA"){
      $q->bindValue(':taux',$account->getTaux());
    }
    else {
      $q->bindValue(':taux',NULL);
    }

    $q->execute();
  }
}

 ?>
