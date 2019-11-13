<?php

require('model/database.php');
require_once 'model/clientDataService.php';
require_once 'model/client.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'user_login';
    }
}

if ($action == 'user_login') {
    include('view/userLogIn.php');
} else if ($action == "user_inform") {
    include('view/user_welcome.php');
}else if($action == "start_workout"){
    include ('view/user_workout_details.php');
}else if($action == "home"){
    include('view/user_welcome.php');
}
