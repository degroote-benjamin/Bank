<?php
include "model/connect.php";
// connect db
$managerUser = new Usermanager($db);
$managerA = new Accountmanager($db);

// if click on submitamount from detail.php
if(isset($_POST['submitamount'])){
  if(isset($_POST['amount'],$_POST['bank'])){
    $account = $managerA->get($_POST['iddetail']);
    if($_POST['bank'] == "withdrawal"){
      $account->withdrawal($_POST['amount']);
    }
    else {
      $account->add($_POST['amount']);
    }
    $managerA->update($account);
  }
}

if(isset($_GET['iddetail']) || isset($_POST['iddetail'])){
  if(isset($_GET['iddetail'])){
    $id = $_GET['iddetail'];
  }
  else {
    $id = $_POST['iddetail'];
  }
  $account = $managerA->get($id);
  include 'view/detail.php';
}
else if(isset($_GET['transfer'])){
  include 'view/transfer.php';
}
else {
include 'view/add_account.php';
}
