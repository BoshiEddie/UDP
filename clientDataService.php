<?php

require_once 'database.php';
require_once  'Client.php';

class clientDataService
{
    function distinctActionName($client_id){
        $db = new Database();
        $conn = $db->getConnection();
        $stmt = $conn ->prepare("SELECT distinct(ea.exercise_name)
                                    FROM result_details rd, set_details sd, exercise_connection ec, exercise_action ea
                                    WHERE rd.set_id = sd.set_id
                                    AND sd.connection_id = ec.id
                                    AND ec.action_id = ea.action_id
                                    AND rd.client_id = ? ");
        $stmt->bind_param("i",$client_id);
        $stmt ->execute();

        $result = $stmt->get_result();
        
        $stmt->close();

        $exercise_name = array();

        while($name = $result->fetch_assoc()){

            array_push($exercise_name,$name);

        }
        return $exercise_name;
    }

    function distinctSheetName($client_id){
        $db = new Database();
        $conn = $db->getConnection();
        $stmt = $conn ->prepare("SELECT distinct(es.sheet_name)
                                FROM exercise_sheet es, result_details rd
                                WHERE es.sheet_id = rd.sheet_id
                                AND rd.client_id = ?");
        $stmt->bind_param("i",$client_id);
        $stmt ->execute();
        $result = $stmt ->get_result();
        $stmt->close();

        $sheet_name = array();

        while($name = $result->fetch_assoc()){

            array_push($sheet_name,$name);

        }
        return $sheet_name;
    }

    function workoutDate($client_id){
        $db = new Database();
        $conn = $db->getConnection();
        $stmt = $conn ->prepare("SELECT distinct(date) FROM result_details WHERE client_id = ?");
        $stmt->bind_param("i",$client_id);
        $stmt ->execute();
        $result = $stmt ->get_result();
        $stmt->close();

        $dates = array();

        while($date = $result->fetch_assoc()){

            array_push($dates,$date);

        }
        return $dates;
        
    }

    function workoutResult($client_id,$dates,$names,$actionnames){

        $db = new Database();
        $conn = $db->getConnection();
        $stmt = $conn -> prepare("SELECT es.sheet_name,ea.exercise_name,rd.reps,rd.weight,rd.date
                                    FROM exercise_sheet es, exercise_action ea, exercise_connection ec, set_details sd, result_details rd
                                    WHERE sd.connection_id = ec.id
                                    AND es.sheet_id = ec.sheet_id
                                    AND ec.action_id = ea.action_id
                                    AND rd.set_id = sd.set_id
                                    AND rd.client_id =?");
                                // --   ORDER BY rd.date desc");
        $stmt->bind_param("i",$client_id);
        $stmt->execute();
        $result=$stmt->get_result();

        $history = array();
        
        foreach($dates as $date){
            $date_array = array();
            foreach($names as $name){
                $sheet_array = array();
                foreach($actionnames as $action){
                    $stmt->execute();
                    $result=$stmt->get_result();
                    $actions_array = array();
                    while($details = $result->fetch_assoc()){
                            
                        if($details['date'] == $date['date']){
                            
                            if($details['sheet_name'] == $name['sheet_name']){

                                if($action['exercise_name'] == $details['exercise_name']){
                                        
                                    array_push($actions_array,$details);

                                }
                                    
                                $sheet_array[$action['exercise_name']] = $actions_array;

                            }

                            $date_array[$name['sheet_name']] = $sheet_array;
                        }            
                    }
                }
            }
            $history[$date['date']] = $date_array;
        }

        return json_encode($history);
        
    }

    function workoutAction($sheet_id){

        $db = new Database();
        $conn = $db ->getConnection();
        $stmt = $conn -> prepare("SELECT DISTINCT(ea.exercise_name)
                                  FROM exercise_action ea, set_details sd, exercise_connection ec
                                  WHERE ec.action_id = ea.action_id
                                  AND ec.id = sd.connection_id
                                  AND ec.sheet_id = ?");
        $stmt->bind_param("i",$sheet_id);
        $stmt->execute();
        $result=$stmt->get_result();
        $stmt->close();
        $actions_array = array();

        

        while($action = $result->fetch_assoc()){

            array_push($actions_array,$action);

        }

        return $actions_array;    

    }

    function workoutDetails($sheet_id,$action_array){

        $db = new Database();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT ea.exercise_name,sd.set_id,sd.repo,sd.weight
                                FROM exercise_action ea, set_details sd, exercise_connection ec
                                WHERE ec.action_id = ea.action_id
                                AND ec.id = sd.connection_id
                                AND ec.sheet_id = ?");
        $stmt->bind_param("i",$sheet_id);
        $stmt->execute();
        $result=$stmt->get_result();
        // $stmt->close();
        
        $actions_array = array();

        foreach($action_array as $action){
            $stmt->execute();
            $result=$stmt->get_result();
            $actions_details_array = array();

            while($details = $result->fetch_assoc()){

                if($details["exercise_name"] == $action["exercise_name"]){
                   
                    array_push($actions_details_array,$details);

                }
            }

            $actions_array[$action["exercise_name"]] = $actions_details_array;

        }

        return $actions_array;

    }


    function findTrainers($client_id){

        $db = new Database();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT i.firstname,i.lastname,i.address,i.phone_number
                                FROM instructors i, clients c, client_list cl
                                WHERE cl.instructor_id = i.instructor_id
                                AND cl.client_id = c.client_id
                                AND c.client_id = ?");
        
        $stmt->bind_param("i",$client_id);

        $stmt->execute();
        
        $result=$stmt->get_result();

        $stmt->close();

        $trainer_array = array();

        while($trainer = $result->fetch_assoc()){

            array_push($trainer_array,$trainer);

        }

        return $trainer_array;

    }


    function findExcerise($client_id){

        $db = new Database();

        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT sheet_id,sheet_name FROM exercise_sheet WHERE client_id = ?");
        
        $stmt->bind_param("i",$client_id);

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        // if(!$result){
        //     return null;
        //     exit;
        // }
        // if($result->num_rows == 0){
        //     return null;
        // }else{
        $sheet_array = array();
        while($sheet = $result->fetch_assoc()){
            array_push($sheet_array,$sheet);                
        }
        return $sheet_array;
        // }
    }


    function findByFirstName($fn)
    {

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

        if (!$result) {
            //echo "Assume SQL stmt has an error";
            return null;
            exit;
        }

        if ($result->num_rows == 0) {
            return null;
        } else {
            // testing that rows were found
            //echo "I found " . $result->num_rows . " results<br>";

            $client_array = array();

            while ($client = $result->fetch_assoc()) {
                // print tests
                //print_r($client);
                //echo "<br>";

                //echo "Client ID = " . $client['client_id'] . " Firstname = " . $client['firstname'] . " Lastname = " . $client['lastname'] . "<br>";
                array_push($client_array, $client);
            }
            return $client_array;
        }
    }

    function findByLastName($ln)
    {

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("SELECT client_id, firstname, lastname FROM clients WHERE lastname LIKE ?");

        $like_ln = "%" . $ln . "%";
        $stmt->bind_param("s", $like_ln);

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            return null;
            exit;
        }

        if ($result->num_rows == 0) {
            return null;
        } else {

            $client_array = array();

            while ($client = $result->fetch_assoc()) {

                array_push($client_array, $client);
            }
            return $client_array;
        }
    }

    function findById($id)
    {

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("SELECT client_id, firstname, lastname FROM clients WHERE client_id LIKE ? LIMIT 1");

        if (!$stmt) {
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }

        //$like_id = "%" . $id . "%";
        $stmt->bind_param("s", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            echo "Assume SQL stmt has an error";
            return null;
            exit;
        }

        if ($result->num_rows == 0) {
            return null;
        } else {

            $client_array = array();

            while ($client = $result->fetch_assoc()) {

                array_push($client_array, $client);
            }
            return $client_array;
        }
    }

    function delete($id)
    {

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("DELETE FROM clients WHERE client_id = ? LIMIT 1");

        if (!$stmt) {
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }

        //$like_id = "%" . $id . "%";
        $stmt->bind_param("i", $id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            echo mysqli_errno($conn);
            echo mysqli_error($conn);
            return false;
        }
    }

    function insert($client)
    {

        $db = new Database();

        $conn = $db->getConnection();

        $stmt = $conn->prepare("INSERT INTO clients (firstname, lastname, address, phone_number, `D.O.B`, medical_issues, current_weight, height, password) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        //$stmt = $conn->prepare("INSERT INTO clients VALUES(firstname = ?, lastname = ?, address = ?, phone_number = ?, `D.O.B` = ?, medical_issues = ?, current_weight = ?, height = ?, password = ?)");

        if (!$stmt) {
            echo "Something wrong in the binding process, SL error<br>";
            echo mysqli_errno($conn) . "<br>";
            printf(' prepare failed: %s', htmlspecialchars(var_dump($conn->error)));
            exit;
        }
        $fn = $client->getFirstname();
        $ln = $client->getLastname();
        $adrs = $client->getAddress();
        $pn = $client->getPhoneNumber();
        $do = $client->getDob();
        $mi = $client->getMedicalIssues();
        $cw = $client->getCurrentWeight();
        $h = $client->getHeight();
        $pwd = $client->getPassword();

        $stmt->bind_param("sssssssss", $fn, $ln, $adrs, $pn, $do, $mi, $cw, $h, $pwd); //, $id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update($id, $client)
    {

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("UPDATE clients SET medical_issues  = ?, current_weight = ? WHERE client_id = ?");

        if (!$stmt) {
            echo "Something wrong in the binding process, SQL error?";
            exit;
        }


        $mi = $client->getMedicalIssues();
        $cw = $client->getCurrentWeight();

        $stmt->bind_param("ssi", $mi, $cw, $id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function findByPhoneNumber($phoneNumber)
    {

        $db = new Database();

        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("SELECT * FROM clients WHERE phone_number = ?");

        $stmt->bind_param("s", $phoneNumber);

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            return null;
            exit;
        }

        if ($result->num_rows == 0) {
            return null;
        } else {

            $client_array = array();

            while ($client = $result->fetch_assoc()) {

                array_push($client_array, $client);
            }
            return $client_array;
        }
    }
}
