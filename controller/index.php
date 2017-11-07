<?php
include "model/connect.php";
// connect db
$managerUser = new Usermanager($db);
if (isset($_POST['submitsignup'])) {
    if (isset($_POST['password'],$_POST['email'],$_POST['passwordcheck'],$_POST['name'])) {
        if ($_POST['password']==$_POST['passwordcheck']) {
            foreach ($_POST as $key => $value) {
                $data[$key] = strip_tags($value);
            }
            $user = new User($data);
            $managerUser->add($user);
        }
    }
}

if (isset($_POST['submitlogin'])) {
    $user = new User($_POST);
    $user1 = $managerUser->get($user);
    var_dump($user,$user1);
    if (password_verify($_POST['password'], $user1->getPassword())) {
      echo 'bonjour';
    }
}

if (isset($_GET['signup'])) {
    include 'view/Signup.php';
} else {
    include 'view/connection.php';
}
