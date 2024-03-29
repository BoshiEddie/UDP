<?php
session_start();
$title = 'User Login';
if (isset($_SESSION['user_session']) != "") {
    header("location:index.php?action=home");
}
include 'asset/include/header.php';

?>


<body>
  <div id="particles-js"></div>
<div class="main_login">
    <form method="post" id="login-form">
        <!-- Hercules Logo -->
        <div id="logoName">
            <img src="asset/images/name.png" alt="Logo" height="230" width="291.33">
        </div>

        <div id="logo">
            <img src="asset/images/name2.png" alt="Logo" height="187" width="187">
        </div>
        <!-- End of Logo -->

        <div id="error">
            <!-- error will be shown here ! -->
        </div>

        <div class="passwordLogin" id="username">
            <input id="phone_number" name="phone_number" modifier="underbar" placeholder="Phone Number" float
                   ng-model="page.username" pattern="[0-9]*$">

            <span id="check-e"></span>
        </div>

        <div class="passwordLogin">
            <input id="password" name="password" type="password" modifier="underbar" placeholder="Password" float
                   ng-model="page.username" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$">

        </div>
        <br/>

        <button type="submit" name="btn-login" class="btn btn-dark" id="btn-login">
            <i aria-hidden="true"></i>
            Sign In
        </button>
</div>
</form>
</div>

<?php include 'asset/include/footer.php'; ?>
</body>

<script src="asset/js/particles.js"></script>
<script src="asset/js/app.js"></script>
