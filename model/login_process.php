<?php

session_start();
require_once 'clientDataService.php';
require_once 'client.php';
$c = new clientDataService();

if (isset($_POST['btn-login'])) {
    $phone_number = trim($_POST['phone_number']);
    $password = trim($_POST['password']);
    $password = sha1($password);

    try {
        $results = $c->findByPhoneNumber($phone_number);
        $count = count($results);

        if($count <=0){
            echo"phone number does not exists";
        } else if ($results[0]['password'] == $password) {
            echo "ok"; // log in
            $_SESSION['user_session'] = $results[0]['phone_number'];
            $_SESSION['user_password'] = $results[0]['password'];
        } else {
            echo "password is wrong try again."; // wrong details
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
