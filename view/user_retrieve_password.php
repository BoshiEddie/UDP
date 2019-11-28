<?php
session_start();
$title = 'Retrieve Password';

include 'asset/include/header.php';
?>


<body>
<div id="particles-js"></div>
<div class="main_login container mx-auto">

    <form action="index.php" method="post" id="retrieve_password_form">

        <div>

            <div id="retrieve_p_error">
                <!-- error will be shown here ! -->
            </div>

            <div>
                <input placeholder="Phone Number" name="phone_Number" id="phone_Number" required autofocus/>
            </div>


            <div>
                <input placeholder="First Name" name="first_name" id="first_name" required autofocus/>
            </div>


            <div>
                <input placeholder="Last Name" name="last_name" id="last_name" required autofocus/>
            </div>


            <div>
                <input placeholder="Date Of Birth DD-MM-YYYY" name="dob" id="dob" required autofocus/>
            </div>


            <div>
                <input type="password" placeholder="New Password" name="re_new_password" id="re_new_password"
                       pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required autofocus/>
            </div>
            <button type="submit" name="btn-retrieve_password" class="btn btn-dark" id="btn-retrieve_password">
                <i aria-hidden="true"></i>
                Retrieve Password
            </button>
        </div>
    </form>

</div>
<?php include 'asset/include/footer.php'; ?>


<script src="asset/js/particles.js"></script>
<script src="asset/js/app.js"></script>

</body>


