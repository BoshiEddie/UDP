<?php

require_once 'Database.php';
require_once 'ExerciseAction.php';

class ExerciseActionDAO{

    function findExercise($en){

        $db = new Database();
        $conn = $db->getConnection();
        // prepared statement helps to prevent SQL injection attacks
        $stmt = $conn->prepare("SELECT ea.exercise_id, ea.exercise_name, bp.body_part_name FROM exercise_action ea INNER JOIN body_part bp ON ea.body_part_id = bp.body_part_id WHERE exercise_name LIKE ?");

        $like_en = "%" . $en . "%";
        $stmt->bind_param("s", $like_en);

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

    function delete($eid){

        $db = new Database();

        $conn = $db->getConnection();
    }

    function insert($exercise){

        $db = new Database();

        $conn = $db->getConnection();


    }


}