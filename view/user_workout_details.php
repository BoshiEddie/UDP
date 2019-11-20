<?php
$title = 'Workout';
include 'asset/include/header.php';
?>

<head>
    <style type="text/css">
        .notFinish {
            background-color: #ff4d4d;
        }
    </style>
</head>
<body onload="timer()" id="workout_body">

<header class="fixed-top">

</header>

<div class="container cont_overflow" id="in_workout">

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


    <div class="border">

    </div>


    <div class="details">
        <h2 id="workout_title">Body part here</h2>

        <!--exercise table here-->
        <table border="1" width=357 height=500>
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
            </tbody>
        </table>
    </div>
    <br>

    <!-- Finish workout button -->
    <div class="buttons">
          <button class="btn-primary btn-lg" id="finish_workout" style="color:#43425D;">
              <b>FINISH WORKOUT</b>
          </button>
    </div>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    //timmer
    let totalCount = 0;

    function timer() {
        console.log("timer working");

        function $(id) {
            return document.getElementById(id)
        }

        let count = 0;
        let timer = null;
        timer = setInterval(function () {
            count++;
            console.log(count);
            console.log("id_S");
            $("id_S").innerHTML = showNum(count % 60);
            $("id_M").innerHTML = showNum(parseInt(count / 60) % 60);
            $("id_H").innerHTML = showNum(parseInt(count / 60 / 60));
        }, 1000);


        $("start").onclick = function () {
            timer = setInterval(function () {
                count++;
                console.log(count);
                console.log("id_S");
                $("id_S").innerHTML = showNum(count % 60);
                $("id_M").innerHTML = showNum(parseInt(count / 60) % 60);
                $("id_H").innerHTML = showNum(parseInt(count / 60 / 60));
            }, 1000)
        };
        $("pause").onclick = function () {
            clearInterval(timer)
        };

        function showNum(num) {
            if (num < 10) {
                return '0' + num
            }
            return num
        };

        $("finish_workout").onclick = function () {
            $("pause").onclick();
            totalCount = count;
            count = 0;
            $("id_S").innerHTML = "00";
            $("id_M").innerHTML = "00";
            $("id_H").innerHTML = "00";
            saveTime(totalCount);
        };
    }

    function saveTime(t) {
        alert(t);
    };

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
            $("#finish_workout").click(function () {
                $(n).addClass("notFinish");
            })
        });
    };

    //Fixed header
    // When the user scrolls the page, execute myFunction
// window.onscroll = function() {myFunction()};
//
// // Get the header
// var header = document.getElementById("myHeader");
//
// // Get the offset position of the navbar
// var sticky = header.offsetTop;
//
// // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
// function myFunction() {
//   if (window.pageYOffset > sticky) {
//     header.classList.add("sticky");
//   } else {
//     header.classList.remove("sticky");
//   }
// }

</script>
</html>
