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

if (isset($_GET['signup'])) {
    include 'view/Signup.php';
} else {
    include 'view/connection.php';
}
