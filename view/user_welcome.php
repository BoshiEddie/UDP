<?php
session_start();
$title = 'Welcome';
include 'asset/include/header.php';

$c = new clientDataService();
$phone_number = $_SESSION['user_session'];
$results = $c->findByPhoneNumber($phone_number);
$_SESSION['user_inform'] = $results;
?>

<body onload="current_time()">
<header class="fixed-top">
    <div class="nav-img ">
        <img src="asset/images/logo_name.png" height="89" width="375">
    </div>
</header>

<div class="container cont_overflow">

<!-- Welcome Message -->
<div class="container cont_overflow">
    <div>
        <h1 id="welcome">Welcome back, <b><?php echo $results[0]['firstname'], " ", $results[0]['lastname']; ?> </b></h1>
        <img class="circular--square" src="asset/images/profile.png" height="50" width="50"/>

        <p id="your_workout">Here's your workout today</p>

        <!-- Box for workout plan -->
        <div class="box">
        <div>
            <h5 id="body_part"><b>Body part here</b></h5>
            <div>
                <b><span id="time"></span></b>
            </div>
        </div>

        <!--exercise table here-->
      <div class="box_2">
        <div id="table">
          <th>
            <tr>EXERCISES</tr>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <tr>SETS</tr>
          </th>
        </div>
      </div>

      <div class="box_3">
        <div id="table">
          <th>
            <tr>BENCH PRESS</tr>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <tr>4</tr>
          </th>
        </div>
      </div>


      </div>
      <!-- End of Box for workout plan -->

    </div>
    <br>
    <div>
        <button id="start_button" class="btn-default btn-lg">
            <a href="index.php?action=start_workout" style="color:white;">START WORKOUT</a>
        </button>
        <br>
    </div>

    <!-- Page Selection -->
    <div class="bottom">
      <nav>
        <a href="index.php?action=home" class="active">Home</a>
        <a href=" index.php?action=home">History</a>
        <a href="index.php?action=setting">Setting</a>
      </nav>
    </div>

</div>
</body>
<?php include 'asset/include/footer.php'; ?>

</html>
