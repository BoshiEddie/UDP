<?php
class Database
{

    private $dbServerName = "localhost";
    private $dbUserName = "root";
    private $dbPassword = "";
    private $dbName = "hercules";

    function getConnection()
    {
        $conn = new mysqli($this->dbServerName, $this->dbUserName, $this->dbPassword, $this->dbName);
        if ($conn->connect_error) {
            echo "Connection Failed" . $conn->connect_error . "<br>";
        } else {
            return $conn;
        }
    }

}