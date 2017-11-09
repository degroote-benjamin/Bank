<?php
include "model/connect.php";
// connect db
$managerUser = new Usermanager($db);
$managerA = new Accountmanager($db);

// if click on submitamount from detail.php
if (isset($_POST['submitamount'])) {
    if (isset($_POST['amount'],$_POST['bank'])) {
        $account = $managerA->get($_POST['iddetail']);
        if ($_POST['bank'] == "withdrawal") {
            $account->withdrawal($_POST['amount']);
        } else {
            $account->add($_POST['amount']);
        }
        $managerA->update($account);
    }
}

if (isset($_POST['submittransfer'])) {
    if (isset($_POST['credit'],$_POST['debit'],$_POST['amount'])) {
        if (isset($_POST['credit'])) {
            $credit = $managerA->get($_POST['credit']);
            $credit->add($_POST['amount']);
            $managerA->update($credit);
        }
        if (isset($_POST['debit'])) {
            $debit = $managerA->get($_POST['debit']);
            $debit->withdrawal($_POST['amount']);
            $managerA->update($debit);
        }
    }
}

// if id detail exist
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
} else {
    include 'view/add_account.php';
}
