<?php
session_start();
$title = 'Settings';
include 'asset/include/header.php';

$client_information = $_SESSION['user_inform'][0];
//echo json_encode($_SESSION['user_inform'][0]);
$c = new clientDataService();
$trainers = $c->findTrainers($client_information['client_id']);
?>

<body>
<header class="fixed-top">
    <div class="nav-img ">
        <img src="asset/images/logo_name.png">
    </div>
    <div class="navbar navbar-fixed-bottom">
        <a href="index.php?action=home"><i class="fas fa-home"></i>&nbspHome</a>
        <a href="index.php?action=history"><i class="fas fa-chart-line"></i>&nbspHistory</a>
        <a href="index.php?action=profile" class="active"><i class="fas fa-user"></i>&nbspProfile</a>
    </div>
</header>

<div class="container cont_overflow">
    <!-- user profile   -->
    <div class="user_profile mx-auto border-bottom">
        <div class="profile_img">
            <img src="asset/images/profile.png">
        </div>
        <div class="profile_details">
            <p class="font-weight-bolder">
                <?php echo $client_information['firstname'], " ", $client_information['lastname']; ?>
            </p>
            <p class="font-weight-lighter">
                <?php echo $client_information['address'] ?>
            </p>
            <p class="font-weight-lighter">
                <?php echo $client_information['phone_number'] ?>
            </p>
        </div>
    </div>
    <div>
        <h4>Reset Password</h4>
        <form action="index.php" method="post" id="reset_password_form">

            <div>

                <div id="reset_p_error">
                    <!-- error will be shown here ! -->
                </div>

                <h5>Current Password:</h5>
                <div>
                    <input type="password" placeholder="Current Password" name="old_password" id="old_password"
                           pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required autofocus/>
                </div>

                <h5>New Password:</h5>
                <div>
                    <input type="password" placeholder="New Password" name="new_password" id="new_password"
                           pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required autofocus/>
                </div>
                <br>
                <button type="submit" name="btn-reset_password" class="btn btn-dark" id="btn-reset_password">
                    <i aria-hidden="true"></i>
                    Reset
                </button>
            </div>


        </form>
    </div>
</div>
</body>
</html>
