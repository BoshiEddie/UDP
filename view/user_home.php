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
        <img src="asset/images/logo_name.png">
    </div>
    <div class="navbar navbar-fixed-bottom">
        <a href="index.php?action=home" class="active"><i class="fas fa-home"></i>&nbspHome</a>
        <a href="index.php?action=history"><i class="fas fa-chart-line"></i>&nbspHistory</a>
        <a href="index.php?action=profile"><i class="fas fa-user"></i>&nbspProfile</a>
    </div>
</header>
<!-- Welcome Message -->
<div class="container cont_overflow">
    <div>
        <div class="animated fadeInUp">
            <h1 id="welcome">Welcome back, <b><?php echo $results[0]['firstname'], " ", $results[0]['lastname']; ?> </b>
            </h1>
            <img class="circular--square" src="asset/images/profile.png" height="50" width="50"/>

            <p id="your_workout">Here's your workout today</p>

        </div>
        <!-- Box for workout plan -->
        <!--        <div class="animated fadeIn delay-1s">-->
    </div>
    <!-- Box for workout plan -->
    <div class="animated fadeIn delay-1s">

        <div class="box">
            <div>
                <h5 id="body_part"><b>Body part here</b></h5>
                <div>
                    <b><span id="time"></span></b>
                </div>
            </div>
            <table class="box_3">
                <thead>
                <tr>
                    <td>Exercise</td>
                    <td>Sets</td>
                </tr>
                </thead>
                <tbody class="box_3">
                <tr>
                    <td>E1</td>
                    <td>4</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- End of Box for workout plan -->

    </div>

    <br>
    <!--    <div class="animated fadeIn delay-1s">-->
    <button id="start_button" class="btn-default btn-lg">
        <a href="index.php?action=start_workout" style="color:white;">START WORKOUT</a>
    </button>
    <br>


</div>


</body>
<?php include 'asset/include/footer.php'; ?>

</html>
