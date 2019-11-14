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
          <img src="./images/name.png" alt="Logo" height="238" width="291.33">
        </div>

        <div id="logo">
          <img src="./images/name2.png" alt="Logo" height="187" width="187">
        </div>
        <!-- End of Logo -->

        <!-- Error -->
        <div id="error">
            <!-- error will be shown here ! -->
        </div>

        <!-- Login Start -->

        <div class="phoneLogin">
            <!-- <input placeholder="Phone Number" name="phone_number" id="phone_number" pattern="[0-9]*$"/> -->
            <ons-input id="username" modifier="underbar" placeholder="Phone Number" float ng-model="page.username"></ons-input>

            <span id="check-e"></span>
        </div>

        <div class="passwordLogin">
            <ons-input id="password" modifier="underbar" placeholder="Password" float ng-model="page.username" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required autofocus></ons-input>

        </div>

        <!-- Remember Me -->
        <div id="remember">
          <label class="left">
            <ons-checkbox input-id="check-1" id="checkbox"></ons-checkbox>
          </label>
          <label for="check-1" class="center">
            Remember Me
          </label>
        </div>

        <div id="fpassword">
          <!-- On click direct to forgot password page -->
          <label onclick="myFunction()" class="center" id="forget">
            Forgot Password
          </label>
        </div>

        <!-- Submit Button -->
        <div id="btn-login">
            <ons-button id="test" type="submit">Sign In</ons-button>
        </div>
    </form>
</div>

<?php include 'include/footer.php'; ?>
</body>
