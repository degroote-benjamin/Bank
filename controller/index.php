<?php
include "model/connect.php";
// connect db
$managerUser = new Usermanager($db);
$managerA = new Accountmanager($db);

// if click on button submit form sign up
if (isset($_POST['submitsignup'])) {
    // all post exist and not empty
    if (isset($_POST['password'],$_POST['email'],$_POST['passwordcheck'],$_POST['name']) && !empty($_POST['password']) && !empty($_POST['passwordcheck']) && !empty($_POST['email']) && !empty($_POST['name'])) {
        unset($_SESSION['error']['emptysignup']);
        foreach ($_POST as $key => $value) {
            $data[$key] = strip_tags($value);
        }
        $data['password'] =password_hash($data['password'], PASSWORD_DEFAULT);
        $user = new User($data);
        $usercheckmail = $managerUser->get($user);
        // check if mail already exist in database
        if ($usercheckmail == false) {
            unset($_SESSION['error']['mail']);
            // password ==
            if ($_POST['password']==$_POST['passwordcheck']) {
                $managerUser->add($user);
                $general = new General();
                $managerA->insertGeneral($general);
                unset($_SESSION['error']['password']);
            } else {
                // if password are not identic
                $_SESSION['error']['password'] = true;
                header('Location:?signup');
                exit;
            }
        }
        // if mail already exist
        else {
            $_SESSION['error']['mail']= true;
            header('Location:?signup');
            exit;
        }
    } else {
        // if one post is empty or not exist
        $_SESSION['error']['emptysignup'] = true;
        header('Location:?signup');
        exit;
    }
}


// if click on button submit for login
if (isset($_POST['submitlogin'])) {
    // all post exist and not empty
    if (isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $user = new User($_POST);
        $user1 = $managerUser->get($user);
        // if email not exist
        if ($user1== true) {
            unset($_SESSION['error']['maillog']);
            // if password is the same as database password
            if (password_verify($_POST['password'], $user1->getPassword())) {
                $_SESSION['user'] = $user1;
                unset($_SESSION['error']['passwordlog']);
            }
            // if wrong password
            else {
                $_SESSION['error']['passwordlog']=true;
            }
        } else {
            $_SESSION['error']['maillog']=true;
        }
    }
}

// if click on add on add_account page
if (isset($_POST['submitadd'])) {
    if (isset($_POST['type'])) {
        foreach ($_POST as $key => $value) {
            $data[$key] = strip_tags($value);
        }
        $data['id_user']= $_SESSION['user']->getIdUser();
        $account = new $_POST['type']($data);
        $managerA->add($account);
    }
}


// if delete , see if the account have more than 0 and if it's a general account
// get account for this user , add the amount of delete account in general account
if (isset($_GET['id_account'])) {
    $account = $managerA->get($_GET['id_account']);
    if($account->getAmount()!=0 && $account->getType()!="General"){
      $general =$managerA->getAccountUser($_SESSION['user']);
      $general->add($account->getAmount());
      $managerA->update($general);
    }
    // can't delete general account
    if ($account->getType()=="General") {
        $_SESSION['error']['delete']=true;
    } else {
        $managerA->delete($account);
    }
}


// if user click on log out in navbar
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}

// if user is connect
if (isset($_SESSION['user'])) {
    $list = $managerA->getList($_SESSION['user']);
    include 'view/index.php';
} else {
    if (isset($_GET['signup'])) {
        include 'view/Signup.php';
    } else {
        include 'view/connection.php';
    }
}

unset($_SESSION['error']);
