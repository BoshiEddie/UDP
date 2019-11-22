<?php

require('model/Database.php');
require_once 'model/clientDataService.php';
require_once 'model/Client.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'user_login';
    }
}

if ($action == 'user_login') {
    include('view/userLogIn.php');
} else if ($action == "home" ) {
        include('view/user_home.php');
}else if($action == "start_workout"){
    include ('view/user_workout_details.php');
}else if($action == "profile"){
    include('view/user_profile.php');
}else if($action == "history"){
    include('view/user_history.php');
}
