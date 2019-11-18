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
        <img src="asset/images/logo_name_fix.png">
    </div>
    <nav class="navbar_bottom fixed-bottom">
        <a href="index.php?action=home" class="active">Home</a>
        <a href=" index.php?action=home">Process</a>
        <a href="index.php?action=setting" ">Setting</a>
    </nav>
</header>

<div class="container cont_overflow">
    <div>
        <h1>Welcome back <?php echo $results[0]['firstname'], " ", $results[0]['lastname']; ?> </h1>
        <p>Here's your workout today</p>
        <div>
            <h2>Body part here</h2>
            <div>
                <span id="time"></span>
            </div>
        </div>

        <!--exercise table here-->
        <table border="1">
            <tr>
                <th>Exercise</th>
                <th>Sets</th>

            </tr>
            <tr>

                <!--
            <?php //foreach ($currencies as $currency) : ?>
                <tr>
                    <td><?php //echo $currency['currency_name']; ?></td>
                    <td><?php //echo $currency['quantity']; ?></td>
                </tr>
            <?php //endforeach; ?>
            -->
            </tr>


        </table>
    </div>
    <br>
    <div>
        <button class="butttons_dark">
            <a href="index.php?action=start_workout" >START WORKOUT</a>
        </button>
        <br>
    </div>


</div>
</body>
<?php include 'asset/include/footer.php'; ?>

</html>