<?php
include "model/connect.php";
// connect db
$managerUser = new Usermanager($db);
$managerA = new Accountmanager($db);

// if click on submitamount from detail.php
if (isset($_POST['submitamount'])) {
    unset($_SESSION['error']['amount']);
    if (isset($_POST['amount'],$_POST['bank']) && !empty($_POST['amount'])) {
        $account = $managerA->get($_POST['iddetail']);
        // if amount  negative , can't add or withdrawal
        if ($_POST['amount']<=0) {
            $_SESSION['error']['amount'] = true;
        } else {
            if ($_POST['bank'] == "withdrawal") {
                $account->withdrawal($_POST['amount']);
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
        if (empty($_POST['amount']) || $_POST['amount']<0) {
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
}


unset($_SESSION['error']);
