<?php
$title = 'Workout';
include 'include/header.php';
?>
<html>
<head>
    <style type="text/css">
        .notFinish {
            background-color: #ff4d4d;
        }
    </style>
</head>
<body>
<div class="nav bottom">
    <a href="index.php?action=home">Home</a>
    <a href="index.php?action=home">Process</a>
    <a href="index.php?action=home">Setting</a>
</div>
<div>
    <div id="count">
        <span id="id_H">00</span>
        <span id="id_M">00</span>
        <span id="id_S">00</span>
    </div>
    <input id="start" type="button" value="start">
    <input id="pause" type="button" value="pause">
    <input id="stop" type="button" value="reset">
</div>


<div>
    <h2>Body part here</h2>

    <!--exercise table here-->
    <table border="1">
        <thead>
        <tr>
            <th>Exercise</th>
            <th>Sets</th>
            <th>Reps</th>
            <th>Kg</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td rowspan="3" id="ex1">Exercise1</td>
            <td class="ex1set">1</td>
            <td>12</td>
            <td>0</td>
        </tr>
        <tr>
            <td class="ex1set">2</td>
            <td>12</td>
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
        </tbody>
    </table>
</div>

<div>
    <button>FINISH WORKOUT</button>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">


    //timmer
    window.onload = function () {
        function $(id) {
            return document.getElementById(id)
        }

        let count = 0
        let timer = null
        $("start").onclick = function () {
            timer = setInterval(function () {
                count++;
                console.log(count)

                console.log($("id_S"))
                $("id_S").innerHTML = showNum(count % 60)
                $("id_M").innerHTML = showNum(parseInt(count / 60) % 60)
                $("id_H").innerHTML = showNum(parseInt(count / 60 / 60))
            }, 1000)
        }
        $("pause").onclick = function () {

            clearInterval(timer)
        }

        $("stop").onclick = function () {

            $("pause").onclick()
            // clearInterval(timer)

            count = 0

            $("id_S").innerHTML = "00"
            $("id_M").innerHTML = "00"
            $("id_H").innerHTML = "00"
        }


        function showNum(num) {
            if (num < 10) {
                return '0' + num
            }
            return num
        }
    }

    //selected table
    for (let i = 1; i <= 2; i++) {
        //whole exercise done
        $("#ex" + i).click(function () {
            $(this).css("backgroundColor", "#7BC96F")
            $(".ex" + i + "set").css("backgroundColor", "#7BC96F")
        });

        //single part down
        $(".ex" + i + "set").each(function (j, n) {
            let len = $(".ex" + i + "set").length
            $(n).click(function () {
                if (j < len - 1) {
                    $(n).css("backgroundColor", "#7BC96F")
                }
                //finish last set
                else if (j >= len - 1) {
                    $("#ex" + i).css("backgroundColor", "#7BC96F")
                    $(".ex" + i + "set").css("backgroundColor", "#7BC96F")
                }
            })
            // $("button").click(function () {
            //     if ($(this).attr("done") == undefined) {
            //         $(this).attr("done", "true");
            //         return;
            //     }
            //     else {
            //         $("div").text($(this).val()+"done");
            //     }
            // })
            //done
            let finishWorkout = false;
            $("button").click(function (finishWorkout) {
                $(n).addClass("notFinish");

            })

            if(!finishWorkout){
                console.log("111111")
            }


        });
    }



</script>
</html>