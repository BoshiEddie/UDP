<?php

require_once 'Database.php';
require_once 'IchangeClientDetailsInterface.php';

class ChangeClientDetailsDAO implements IchangeClientDetailsInterface {

    function changeFirstName($cid, $fn){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE clients SET firstname  = ? WHERE client_id = ?");

        if (!$stmt) {
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }


        $stmt->bind_param("si", $fn, $cid);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

    function changeLastName($cid, $ln){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE clients SET lastname  = ? WHERE client_id = ?");

        if (!$stmt) {
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }


        $stmt->bind_param("si", $ln, $cid);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

    function changeFullName($cid, $fn, $ln){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE clients SET firstname  = ?, lastname = ? WHERE client_id = ?");

        if (!$stmt) {
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }


        $stmt->bind_param("ssi", $fn, $ln, $cid);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

    function changeAddress($cid, $adrs){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE clients SET address  = ? WHERE client_id = ?");

        if (!$stmt) {
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }


        $stmt->bind_param("si", $adrs, $cid);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

    function changePhoneNumber($cid, $pn){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE clients SET phone_number  = ? WHERE client_id = ?");

        if (!$stmt) {
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }


        $stmt->bind_param("si", $pn, $cid);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

    function changeMedicalIssues($cid, $mi){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE clients SET medical_issues  = ? WHERE client_id = ?");

        if (!$stmt) {
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }


        $stmt->bind_param("si", $mi, $cid);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

    function changeCurrentWeight($cid, $w){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE clients SET current_weight  = ? WHERE client_id = ?");

        if (!$stmt) {
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }


        $stmt->bind_param("si", $w, $cid);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

    function changePassword($cid, $pwd){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE clients SET password  = ? WHERE client_id = ?");

        if (!$stmt) {
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }


        $stmt->bind_param("si", $pwd, $cid);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

    function changeEmail($cid, $eml){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE clients SET email  = ? WHERE client_id = ?");

        if (!$stmt) {
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }


        $stmt->bind_param("si", $eml, $cid);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

    function changeAll($cid, $fn, $ln, $adrs, $pn, $mi, $w, $pwd, $eml){

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE clients SET firstname = ?, lastname = ?, address = ?, phone_number = ?, medical_issues = ?, current_weight = ?, password = ?, email  = ? WHERE client_id = ?");

        if (!$stmt) {
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }

        $stmt->bind_param("ssssssssi", $fn, $ln, $adrs, $pn, $mi, $w, $pwd, $eml, $cid);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }else{
            return false;
        }
    }
}