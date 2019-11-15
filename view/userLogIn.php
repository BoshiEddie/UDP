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
            <input id="phone_number" name="phone_number" modifier="underbar" placeholder="Phone Number" float
                   ng-model="page.username" pattern="[0-9]*$"></input>

            <span id="check-e"></span>
        </div>



        <h5>Password:</h5>
        <div>
            <input type="password" placeholder="password" name="password" id="password"
                   pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required autofocus/>

            <!-- Login Start -->
            <div class="phoneLogin">

                <ons-input id="phone_number" name="phone_number" modifier="underbar" placeholder="Phone Number" float
                           ng-model="page.username" pattern="[0-9]*$"></ons-input>


                <ons-input id="phone_number" name="phone_number" modifier="underbar" placeholder="Phone Number" float
                           ng-model="page.username" pattern="[0-9]*$"></ons-input>


                <span id="check-e"></span>
            </div>

            <div class="passwordLogin">

                <ons-input id="password" name="password" type="password" modifier="underbar" placeholder="Password"
                           float ng-model="page.username" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$"></ons-input>


                <ons-input id="password" name="password" type="password" modifier="underbar" placeholder="Password"
                           float ng-model="page.username" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$"></ons-input>


                <div class="passwordLogin">
                    <input id="password" name="password" type="password" modifier="underbar" placeholder="Password"
                           float ng-model="page.username" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$"></input>

        <div class="passwordLogin">
            <input id="password" name="password" type="password" modifier="underbar" placeholder="Password" float ng-model="page.username" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$"></input>

        </div>
        <br/>

                </div>
                <br/>


                <div>

        <div>
            <button type="submit" name="btn-login" class="btn btn-secondary btn-lg" id="btn-login">

                <i aria-hidden="true"></i>
                Sign In
            </button>
        </div>



                    <button type="submit" name="btn-login" id="btn-login">

                        <button type="submit" name="btn-login" class="btn btn-secondary btn-lg" id="btn-login">

                            <i aria-hidden="true"></i>
                            Sign In
                        </button>
                </div>

                <button type="submit" name="btn-login" class="btn btn-dark" id="btn-login">
                    <i aria-hidden="true"></i>
                    Sign In
                </button>
            </div>


    </form>
</div>


<?php include 'include/footer.php'; ?>
</body>