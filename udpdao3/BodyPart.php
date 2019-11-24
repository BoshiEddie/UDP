<?php


class BodyPart{

    private $body_part_id;
    private $body_part_name;

    public function __construct($bpid, $bpn){

        $this->body_part_id = $bpid;
        $this->body_part_name = $bpn;
    }


}