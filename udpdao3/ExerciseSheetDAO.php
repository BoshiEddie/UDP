<?php

require_once 'Database.php';

class ExerciseSheetDAO{

    function findSheet($sn){

        $db = new Database();
        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("SELECT es.sheet_name, c.firstname, c.lastname, i.firstname, i.lastname FROM ((exercise_sheet es INNER JOIN clients c ON es.client_id = c.client_id) INNER JOIN instructors i ON es.instructor_id = i.instructor_id) WHERE sheet_name LIKE ?");

        $like_sn = "%" . $sn . "%";
        $stmt->bind_param("s", $like_sn);

        $stmt->execute();

        $result = $stmt->get_result();


        if(!$result){
            return null;
            exit;
        }

        if($result->num_rows == 0){
            return null;
        }else{


            $exercise_array = array();

            while ($exercise = $result->fetch_assoc()){

                array_push($exercise_array, $exercise);
            }
            return $exercise_array;
        }

    }
}