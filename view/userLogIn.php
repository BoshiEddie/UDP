<?php
$title = 'User Login';
include 'include/header.php';
session_start();
if (isset($_SESSION['user_session']) != "") {
    header("location:index.php?action=user_inform");
}
?>

<body>
<div>
    <form method="post" id="login-form">
        <!-- Hercules Logo -->
        <div id="logoName">
            <img src="./images/name.png" alt="Logo" height="230" width="291.33">
        </div>

        <div id="logo">
            <img src="./images/name2.png" alt="Logo" height="187" width="187">
        </div>
        <!-- End of Logo -->

        <div id="error">
            <!-- error will be shown here ! -->
        </div>

        <div class="passwordLogin" id="username">
            <input id="phone_number" name="phone_number" modifier="underbar" placeholder="Phone Number" float ng-model="page.username" pattern="[0-9]*$"></input>

            <span id="check-e"></span>
        </div>

        <div class="passwordLogin">
            <input id="password" name="password" type="password" modifier="underbar" placeholder="Password" float ng-model="page.username" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$"></input>
        </div>
        <br/>



        <div>
            <button type="submit" name="btn-login" class="btn btn-secondary btn-lg" id="btn-login">
                <i aria-hidden="true"></i>
                Sign In
            </button>
        </div>

    </form>
</div>


<?php include 'include/footer.php'; ?>
</body>