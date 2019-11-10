<?php

session_start();
require_once 'database.php';
if (isset($_POST['btn-login'])) {
    $phone_number = trim($_POST['phone_number']);
    $password = trim($_POST['password']);

    $password = sha1($password);

    try {
        //change sql statement here
        $stmt = $db->prepare("SELECT * FROM clients WHERE phone_number=:phone_number");
        $stmt->execute(array(":phone_number" => $phone_number));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();

        if($count <=0){
            echo"phone number does not exists";
        } else if ($row['password'] == $password) {
            echo "ok"; // log in
            $_SESSION['user_session'] = $row['phone_number'];
            $_SESSION['user_password'] = $row['password'];
        } else {
            echo "password is wrong try again."; // wrong details
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

