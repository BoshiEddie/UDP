<?php


interface IinstructorInterface{

    function findByFirstName($fn);
    function delete($id);
    function insert($fn, $ln, $adrs, $pn, $dob, $pwd, $gid, $eml);
    function update($id, $fn, $ln, $adrs, $pn, $dob, $pwd, $gid, $eml);

}