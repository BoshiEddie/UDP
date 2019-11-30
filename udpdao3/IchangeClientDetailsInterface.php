<?php


interface IchangeClientDetailsInterface{

    function changeFirstName($cid, $fn);
    function changeLastName($cid, $ln);
    function changeFullName($cid, $fn, $ln);
    function changeAddress($cid, $adrs);
    function changePhoneNumber($cid, $pn);
    function changeMedicalIssues($cid, $mi);
    function changeCurrentWeight($cid, $w);
    function changePassword($cid, $pwd);
    function changeEmail($cid, $eml);
    function changeAll($cid, $fn, $ln, $adrs, $pn, $mi, $w, $pwd, $eml);

}