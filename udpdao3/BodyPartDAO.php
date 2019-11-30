<?php

require_once 'Database.php';

class BodyPartDAO{

    function findByBodyPartName($bpn){

        $db = new Database();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT body_part_name FROM body_part WHERE body_part_name LIKE ?");
        $like_bpn = "%" . $bpn . "%";
        $stmt->bind_param("s", $like_bpn);
        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result){

            return null;
            exit;
        }
        if($result->num_rows == 0){
            return null;
        }else {

            $bodyp_array = array();

            while ($bodyp = $result->fetch_assoc()) {

                array_push($bodyp_array, $bodyp);
            }
            return $bodyp_array;
        }
    }
}