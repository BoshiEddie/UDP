<?php
session_start();
$title = 'Welcome';
include 'include/header.php';

$c = new clientDataService();
$phone_number = $_SESSION['user_session'];
$results = $c->findByPhoneNumber($phone_number);
$_SESSION['user_inform'] = $results;
?>

<body onload="current_time()">
<nav class="nav navbar-dark">
    <a href="index.php?action=home">Home</a>
    <a href="index.php?action=home">Process</a>
    <a href="index.php?action=setting">Setting</a>
</nav>

<div id=" content">
    <div>


        <!--change 'card_holder' to the column name here    -->
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
    <button>
        <a href="index.php?action=start_workout">START WORKOUT</a>
    </button>
    <br>

</div>
</body>
<?php include 'include/footer.php'; ?>

</html>