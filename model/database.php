<?php

define('MYSQL_USER', 'root');

//MySQL password.
define('MYSQL_PASSWORD', '');

//The server that MySQL is located on.
define('MYSQL_HOST', 'localhost');

//The name of our database.
define('MYSQL_DATABASE', 'hercules');

/**
 * PDO options / configuration details.
 * I'm going to set the error mode to "Exceptions".
 * I'm also going to turn off emulated prepared statements.
 */
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

/**
 * Connect to MySQL and instantiate the PDO object.
 */
try {
    $db = new PDO(
            "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, //DSN
            MYSQL_USER, //Username
            MYSQL_PASSWORD, //Password
            $pdoOptions //Options
    );
} catch (Exception $ex) {
    $error_message = $ex->getMessage();
    include('./errors/database_error.php');
    exit();
}

//$dsn = 'mysql:host=localhost;dbname=currency_exchange_system';
//$username = 'managers';
//$password = 'managers';
//
//try {
//    $db = new PDO($dsn, $username, $password);
//} catch (PDOException $e) {
//    $error_message = $e->getMessage();
//    include('./errors/database_error.php');
//    exit();
//}
?>