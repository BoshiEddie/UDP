<?php


interface IclientInterface{

    function findByFirstName($fn);
    function findByLastName($ln);
    function findById($id);
    function delete($id);
    function insert($fn, $ln, $adrs, $pn, $do, $mi, $cw, $h, $pwd);
    function update($id, $fn, $ln, $adrs, $pn, $do, $mi, $cw, $h, $pwd);

}