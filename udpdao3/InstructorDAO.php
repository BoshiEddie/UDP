<?php

require_once 'Database.php';
require_once  'IinstructorInterface.php';

class InstructorDAO implements IinstructorInterface{

    function findByFirstName($fn){

        $db = new Database();


        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("SELECT instructor_id, firstname, lastname FROM instructors WHERE firstname LIKE ?");

        $like_fn = "%" . $fn . "%";
        $stmt->bind_param("s", $like_fn);

        $stmt->execute();

        $result = $stmt->get_result();

        if(!$result){
            //echo "Assume SQL stmt has an error";
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
        $stmt = $conn->prepare("DELETE FROM instructors WHERE instructor_id = ? LIMIT 1");

        if(!$stmt){
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }

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

    function insert($fn, $ln, $adrs, $pn, $dob, $pwd, $gid, $eml){

        $db = new Database();

        $conn = $db->getConnection();

        $stmt = $conn->prepare("INSERT INTO instructors (firstname, lastname, address, phone_number, `D.O.B`, password, gym_id, email) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
        //$stmt = $conn->prepare("INSERT INTO clients VALUES(firstname = ?, lastname = ?, address = ?, phone_number = ?, `D.O.B` = ?, medical_issues = ?, current_weight = ?, height = ?, password = ?)");

        if(!$stmt){
            echo "Something wrong in the binding process, SL error<br>";
            echo mysqli_errno($conn) . "<br>";
            printf(' prepare failed: %s', htmlspecialchars(var_dump($conn->error)));
            exit;
        }

        $stmt->bind_param("ssssssis", $fn, $ln, $adrs, $pn, $dob, $pwd, $gid, $eml); //, $id);

        $stmt->execute();

        if($stmt->affected_rows > 0){
            return true;
        }else{
            echo mysqli_errno($conn) . "<br>";
            echo mysqli_error($conn) . "<br>";
            return false;
        }
    }

    function update($id, $fn, $ln, $adrs, $pn, $dob, $pwd, $gid, $eml){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE instructors SET phone_number  = ?, email = ? WHERE instructor_id = ?");

        if(!$stmt){
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }

        $stmt->bind_param("ssi", $pn, $eml, $id);

        $stmt->execute();

        if($stmt->affected_rows > 0){
            return true;
        }else{
            return false;
        }
    }
}