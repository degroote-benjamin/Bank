<?php
include "model/connect.php";
// connect db
$managerUser = new Usermanager($db);

// if click on button submit form sign up
if (isset($_POST['submitsignup'])) {
    // all post exist and not empty
    if (isset($_POST['password'],$_POST['email'],$_POST['passwordcheck'],$_POST['name']) && !empty($_POST['password']) && !empty($_POST['passwordcheck']) && !empty($_POST['email']) && !empty($_POST['name'])) {
        unset($_SESSION['error']['emptysignup']);
        foreach ($_POST as $key => $value) {
            $data[$key] = strip_tags($value);
        }
        $user = new User($data);
        $usercheckmail = $managerUser->get($user);
        // check if mail already exist in database
        if ($usercheckmail->getEmail() == null) {
          unset($_SESSION['error']['mail']);
            // password ==
            if ($_POST['password']==$_POST['passwordcheck']) {
                $managerUser->add($user);
                unset($_SESSION['error']['password']);
            } else {
                // if password are not identic
                $_SESSION['error']['password'] = true;
                header('Location:?signup');
            }
        }
        // if mail already exist
        else {
          $_SESSION['error']['mail']= true;
          header('Location:?signup');
        }
    } else {
        // if one post is empty or not exist
        $_SESSION['error']['emptysignup'] = true;
        header('Location:?signup');
    }
}


// if click on button submit for login
if (isset($_POST['submitlogin'])) {
    // all post exist and not empty
    if (isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $user = new User($_POST);
        $user1 = $managerUser->get($user);
        // if password is the same as database password
        if (password_verify($_POST['password'], $user1->getPassword())) {
            $_SESSION['user'] = $user1;
        }
    }
}


if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}


if (isset($_SESSION['user'])) {
    include 'view/index.php';
} else {
    if (isset($_GET['signup'])) {
        include 'view/Signup.php';
    } else {
        include 'view/connection.php';
    }
}
