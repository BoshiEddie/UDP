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
        <div id="error">
            <!-- error will be shown here ! -->
        </div>

        <h5>Phone Number:</h5>

        <div>
            <input placeholder="Phone Number" name="phone_number" id="phone_number" pattern="[0-9]*$"/>
            <span id="check-e"></span>
        </div>

        <h5>Password:</h5>
        <div>
            <input type="password" placeholder="password" name="password" id="password"
                   pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required autofocus/>

        <!-- Login Start -->
        <div class="phoneLogin">

            <ons-input id="phone_number" name="phone_number" modifier="underbar" placeholder="Phone Number" float ng-model="page.username" pattern="[0-9]*$"></ons-input>


            <ons-input id="phone_number" name="phone_number" modifier="underbar" placeholder="Phone Number" float ng-model="page.username" pattern="[0-9]*$"></ons-input>


            <span id="check-e"></span>
        </div>

        <div class="passwordLogin">

            <ons-input id="password" name="password" type="password" modifier="underbar" placeholder="Password" float ng-model="page.username" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$"></ons-input>


            <ons-input id="password" name="password" type="password" modifier="underbar" placeholder="Password" float ng-model="page.username" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$"></ons-input>


        </div>
        <br/>
        <div>

            <button type="submit" name="btn-login" id="btn-login">
                <i aria-hidden="true"></i>
                Sign In
            </button>
        </div>

          <button type="submit" name="btn-login" class="btn btn-dark"id="btn-login">
          <i aria-hidden="true"></i>
            Sign In
          </button>
        </div>



    </form>
</div>


<?php include 'include/footer.php'; ?>
</body>


