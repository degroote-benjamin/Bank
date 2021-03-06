<?php
include "model/connect.php";
// connect db
$managerUser = new Usermanager($db);
$managerA = new Accountmanager($db);

// if click on submitamount from detail.php , get account if id account and add or withdrawal account and update in database
if (isset($_POST['submitamount'])) {
    unset($_SESSION['error']['amount']);
    if (isset($_POST['amount'],$_POST['bank']) && !empty($_POST['amount'])) {
        $account = $managerA->get($_POST['iddetail']);
        // if amount  negative , can't add or withdrawal
        if ($_POST['amount']<=0 || $_POST['amount']>999999999) {
            $_SESSION['error']['amount'] = true;
        } else {
            if ($_POST['bank'] == "withdrawal") {
              if($account->getType() != "Pel"){
                $account->withdrawal($_POST['amount']);
              }
              else if($account->diff() < 600){
                $_SESSION['error']['pel']=true;
                header('Location:index.php?id_account='.$account->getIdAccount());
                exit;
              }
            } else {
                $account->add($_POST['amount']);
            }
            $managerA->update($account);
        }
    }
}

// if click on submit transfer , isset all post , and do credit / debit account
if (isset($_POST['submittransfer'])) {
    if (isset($_POST['credit'],$_POST['debit'],$_POST['amount'])) {
        if (empty($_POST['amount']) || $_POST['amount']<0 || $_POST['amount']>999999999) {
            $_SESSION['error']['amount'] = true;
        } else {
            unset($_SESSION['error']['amount']);

            //credit
            $credit = $managerA->get($_POST['credit']);
            $credit->add($_POST['amount']);
            $managerA->update($credit);

            // debit
            $debit = $managerA->get($_POST['debit']);
            $debit->withdrawal($_POST['amount']);
            $managerA->update($debit);
        }
    }
}

// if id detail exist , get account detail wtih account id , get account list with id user if transfer $_GET
if (isset($_GET['iddetail']) || isset($_POST['iddetail'])) {
    // create universal $id
    if (isset($_GET['iddetail'])) {
        $id = $_GET['iddetail'];
    } else {
        $id = $_POST['iddetail'];
    }
    $account = $managerA->get($id);
    include 'view/detail.php';
} elseif (isset($_GET['transfer'])) {
    $list=$managerA->getList($_SESSION['user']);
    include 'view/transfer.php';
}
else {
  header('Location:index.php');
}


unset($_SESSION['error']);
