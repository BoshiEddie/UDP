<?php

session_start();
require_once 'clientDataService.php';
require_once 'Client.php';
$c = new clientDataService();

if (isset($_POST['btn-reset_password'])) {
    $client_information = $_SESSION['user_inform'][0];
    $old_password = trim($_POST['old_password']);
    $new_password = trim($_POST['new_password']);

    $old_password = sha1($old_password);
    $new_password = sha1($new_password);

    try {
        if ($client_information['password'] != $old_password) {
            echo "current password wrong";
        } else if ($old_password == $new_password) {
            echo "new password can not be same with old password";
        } else {
            echo "ok";
            //update password query

        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['btn-retrieve_password'])) {

    $phone_Number = trim($_POST['phone_Number']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $dob = trim($_POST['dob']);
    $re_new_password = trim($_POST['re_new_password']);
    $re_new_password = sha1($re_new_password);
    try {
        $results = $c->findByPhoneNumber($phone_Number);
        $count = count($results);

        if ($count <= 0) {
            echo "phone number does not exists";
        } else if ($results[0]['firstname'] != $first_name) {
            echo "First Name is wrong";

        } else if ($results[0]['lastname'] != $last_name) {
            echo "Last Name is wrong";
        } else if ($results[0]['D.O.B'] != $dob) {
            echo "Date Of Birth is wrong";
        } else if ($results[0]['password'] != $re_new_password) {
            echo "new password can not be same with current password";
        } else {
            echo "ok";
            //update password query

        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}