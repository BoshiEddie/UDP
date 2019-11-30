<?php

require_once 'Database.php';
require_once 'IclientInterface.php';

class ClientDAO implements IclientInterface{

    function findByFirstName($fn){

        $db = new Database();

        // print tests
        //echo "testing the db data<br>";
        //print_r($db);
        //echo "I am searching for " . $n . "<br>";


        //$sql_query = "SELECT client_id, firstname, lastname FROM clients WHERE firstname LIKE '%$fn%'";
        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("SELECT client_id, firstname, lastname FROM clients WHERE firstname LIKE ?");

        $like_fn = "%" . $fn . "%";
        $stmt->bind_param("s", $like_fn);

        $stmt->execute();

        $result = $stmt->get_result();

        //$result = $conn->query($sql_query);

        if(!$result){
            //echo "Assume SQL stmt has an error";
            return null;
            exit;
        }

        if($result->num_rows == 0){
            return null;
        }else{
            // testing that rows were found
            //echo "I found " . $result->num_rows . " results<br>";

            $client_array = array();

            while ($client = $result->fetch_assoc()){
                // print tests
                //print_r($client);
                //echo "<br>";

                //echo "Client ID = " . $client['client_id'] . " Firstname = " . $client['firstname'] . " Lastname = " . $client['lastname'] . "<br>";
                array_push($client_array, $client);
            }
            return $client_array;
        }
    }

    function findByLastName($ln){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("SELECT client_id, firstname, lastname FROM clients WHERE lastname LIKE ?");

        $like_ln = "%" . $ln . "%";
        $stmt->bind_param("s", $like_ln);

        $stmt->execute();

        $result = $stmt->get_result();

        if(!$result){
            return null;
            exit;
        }

        if($result->num_rows == 0){
            return null;
        }else{

            $client_array = array();

            while ($client = $result->fetch_assoc()){

                array_push($client_array, $client);
            }
            return $client_array;
        }
    }

    function findById($id){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("SELECT client_id, firstname, lastname FROM clients WHERE client_id LIKE ? LIMIT 1");

        if(!$stmt){
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }

        //$like_id = "%" . $id . "%";
        $stmt->bind_param("s", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if(!$result){
            echo "Assume SQL stmt has an error";
            return null;
            exit;
        }

        if($result->num_rows == 0){
            return null;
        }else{

            $client_array = array();

            while ($client = $result->fetch_assoc()){

                array_push($client_array, $client);
            }
            return $client_array;
        }
    }

    function delete($id){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("DELETE FROM clients WHERE client_id = ? LIMIT 1");

        if(!$stmt){
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }

        //$like_id = "%" . $id . "%";
        $stmt->bind_param("i", $id);

        $stmt->execute();

        if($stmt->affected_rows > 0){
            return true;
        }else{
            echo mysqli_errno($conn);
            echo mysqli_error($conn);
            return false;
        }
    }

    function insert($fn, $ln, $adrs, $pn, $do, $mi, $cw, $h, $pwd){

        $db = new Database();

        $conn = $db->getConnection();

        $stmt = $conn->prepare("INSERT INTO clients (firstname, lastname, address, phone_number, `D.O.B`, medical_issues, current_weight, height, password) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        //$stmt = $conn->prepare("INSERT INTO clients VALUES(firstname = ?, lastname = ?, address = ?, phone_number = ?, `D.O.B` = ?, medical_issues = ?, current_weight = ?, height = ?, password = ?)");

        if(!$stmt){
            echo "Something wrong in the binding process, SL error<br>";
            echo mysqli_errno($conn) . "<br>";
            printf(' prepare failed: %s', htmlspecialchars(var_dump($conn->error)));
            exit;
        }
        //$fn = $client->getFirstname();
        //$ln = $client->getLastname();
        //$adrs = $client->getAddress();
        //$pn = $client->getPhoneNumber();
        //$do = $client->getDob();
        //$mi = $client->getMedicalIssues();
        //$cw = $client->getCurrentWeight();
        //$h = $client->getHeight();
        //$pwd = $client->getPassword();

        $stmt->bind_param("sssssssss", $fn, $ln, $adrs, $pn, $do, $mi, $cw, $h, $pwd); //, $id);

        $stmt->execute();

        if($stmt->affected_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    function update($id, $fn, $ln, $adrs, $pn, $do, $mi, $cw, $h, $pwd){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE clients SET medical_issues  = ?, current_weight = ? WHERE client_id = ?");

        if(!$stmt){
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }


        $stmt->bind_param("ssi", $mi, $cw, $id);

        $stmt->execute();

        if($stmt->affected_rows > 0){
            return true;
        }else{
            return false;
        }
    }

}