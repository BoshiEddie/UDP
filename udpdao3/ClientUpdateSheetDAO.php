<?php

require_once 'Database.php';
require_once 'IclientUpdateSheetInterface.php';

class ClientUpdateSheetDAO implements IclientUpdateSheetInterface {

    function changeReps($setId, $reps){

        $db = new Database();


        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE set_details SET reps = ? WHERE set_id = ?");

        $stmt->bind_param("ii", $reps, $setId);

        $stmt->execute();

        if($stmt->affected_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    function changeWeight($setId, $weight){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE set_details SET weight = ? WHERE set_id = ?");

        $stmt->bind_param("ii", $weight, $setId);

        $stmt->execute();

        if($stmt->affected_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    function changeSet($setId, $reps, $weight){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE set_details SET reps = ?, weight = ? WHERE set_id = ?");

        $stmt->bind_param("iii", $reps, $weight, $setId);

        $stmt->execute();

        if($stmt->affected_rows > 0){
            return true;
        }else{
            return false;
        }
    }
}