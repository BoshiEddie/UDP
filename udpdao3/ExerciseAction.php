<?php


class ExerciseAction{

    private $exercise_id;
    private $exercise_name;
    private $body_part_id;

    public function __construct($eid, $en, $bpid){

        $this->exercise_id = $eid;
        $this->exercise_name = $en;
        $this->body_part_id = $bpid;

    }

}