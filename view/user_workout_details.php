<?php
$title = 'Workout';
include 'asset/include/header.php';
?>

<head>
    <style type="text/css">
        .notFinish {
            background-color: #ff4d4d;
        }

        .finishedWorkout {
            background-color: #7BC96F;
        }
    </style>
</head>
<body onload="timer()" id="workout_body">

<div class="header" id="myHeader">
    <!-- Div for workout timer -->
    <div>
        <div id="count">
            <b>
                <span id="id_H">00</span>
                <span>:</span>
                <span id="id_M">00</span>
                <span>:</span>
                <span id="id_S">00</span>
            </b>
        </div>
        <p id="duration">Duration</p>

        <!-- <input id="pause" type="button" value="pause">
        <input id="start" type="button" value="start"> -->
    </div>

    <!-- Div for rest and finish -->
    <!-- <span id="stopwatch" class="fas fa-stopwatch fa-lg"></span>
    <span class="fas fa-check fa-lg"></span> -->

    <div class="rest_finish_1">
        &nbsp

        <span id="stopwatch" class="fas fa-stopwatch fa-lg"></span>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

        <span class="fas fa-check fa-lg"></span>

        <div class="rest_finish">

            <span id="pause" type="button" value="pause">Rest</span>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <span id="finish">Finish</span>
        </div>

    </div>

</div>
<!--tables part-->
<div class="container cont_overflow_height">
    <div class="details">
        <h2 id="workout_title">Body part here</h2>

        <!--exercise table here-->
        <table class="table table-bordered ">
            <thead class="thead">
            <tr height=70>
                <th>Exercise</th>
                <th>Sets</th>
                <th>Reps</th>
                <th>Kg</th>
            </tr>
            </thead>

            <tbody class="tbody">
            <tr>
                <td rowspan="3" id="ex1">Exercise1</td>
                <td class="ex1set">1</td>
                <td>12</td>
                <td>0</td>
            </tr>
            <tr>
                <td class="ex1set">2</td>
                <td>12</td>
                <!-- <input type="text" name="" value="0" style="text-align:center"> -->
                <td>0</td>
            </tr>
            <tr>
                <td class="ex1set">3</td>
                <td>12</td>
                <td>0</td>
            </tr>
            <tr>
                <td rowspan="3" id="ex2">Exercise2</td>
                <td class="ex2set">1</td>
                <td>10</td>
                <td>10</td>
            </tr>
            <tr>
                <td class="ex2set">2</td>
                <td>10</td>
                <td>10</td>
            </tr>
            <tr>
                <td class="ex2set">3</td>
                <td>10</td>
                <td>10</td>
            </tr>
            <tr>
                <td rowspan="3" id="ex3">Exercise3</td>
                <td class="ex3set">1</td>
                <td>12</td>
                <td>0</td>
            </tr>
            <tr>
                <td class="ex3set">2</td>
                <td>12</td>
                <!-- <input type="text" name="" value="0" style="text-align:center"> -->
                <td>0</td>
            </tr>
            <tr>
                <td class="ex3set">3</td>
                <td>12</td>
                <td>0</td>
            </tr>
            <tr>
                <td rowspan="3" id="ex4">Exercise4</td>
                <td class="ex4set">1</td>
                <td>12</td>
                <td>0</td>
            </tr>
            <tr>
                <td class="ex4set">2</td>
                <td>12</td>
                <!-- <input type="text" name="" value="0" style="text-align:center"> -->
                <td>0</td>
            </tr>
            <tr>
                <td class="ex4set">3</td>
                <td>12</td>
                <td>0</td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>

    <!-- Finish workout button -->
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn-primary btn-lg buttons" data-toggle="modal"
                data-target="#exampleModal" id="finish_workout" style="color:#43425D;">
            <b>FINISH WORKOUT</b>
        </button>

        <!-- dialog box -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Save Workout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Please confirm to save your workout.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info" id="save_workout">Save Workout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        for (let i = 1; i <= 4; i++) {
            //whole exercise done
            $("#ex" + i).click(function () {
                $(this).toggleClass("finishedWorkout")
                $(".ex" + i + "set").toggleClass("finishedWorkout")
            });

            //single part down
            $(".ex" + i + "set").each(function (j, n) {
                let len = $(".ex" + i + "set").length
                $(n).click(function () {
                    if (j < len - 1) {
                        $(n).toggleClass("finishedWorkout")
                    }
                    //finish last set
                    else if (j >= len - 1) {
                        $("#ex" + i).toggleClass("finishedWorkout")
                        $(".ex" + i + "set").toggleClass("finishedWorkout")
                    }
                })

                $("#finish_workout").click(function () {
                    $(n).addClass("notFinish");
                })
            });
        }


        $('#save_workout').click(function () {
            window.location.href = "index.php?action=history";
        })
    });
</script>
</html>
