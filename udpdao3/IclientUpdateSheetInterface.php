<?php


interface IclientUpdateSheetInterface{

    function changeReps($setId, $reps);
    function changeWeight($setId, $weight);
    function changeSet($setId, $reps, $weight);
}