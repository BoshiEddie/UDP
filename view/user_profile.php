<?php
$title = 'Settings';
include 'asset/include/header.php';
session_start();
$client_information = $_SESSION['user_inform'][0];
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
    <!-- user data   -->
    <div class="user_data mx-auto">
        <h4>My Info</h4>
        <table class="table table-bordered table-hover">
            <tbody>
            <tr>
                <td>Age:</td>
                <td id="age"><b></b></td>
            </tr>
            <tr>
                <td>Weight:</td>
                <td id="weight"></td>
            </tr>
            <tr>
                <td>Height:</td>
                <td id="height"></td>
            </tr>
            <tr>
                <td>Medical issues:</td>
                <td id="medical_issues"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- user's trainer-->
    <div class="trainer_profile mx-auto border-bottom">
        <h5>My Trainer</h5>
        <div class="profile_img">
            <img src="asset/images/profile.png">
        </div>
        <div class="profile_details">
            <p class="font-weight-bolder">
                Chris Jericho
            </p>
            <p class="font-weight-lighter">
                Dundalk
            </p>
            <p class="font-weight-lighter">
                8715674877
            </p>
        </div>
    </div>

    <br><br><br>
    <div class="buttons">
        <button class="btn-primary btn-lg" id="signout">
            <a href="model/logout.php" style="color:#43425D;">Sign Out</a>
        </button>

        <!--          <button class="btn-primary btn-lg" id="reset">-->
        <!--              <a href="" style="color:#43425D;">Reset Password</a>-->
        <!--          </button>-->
    </div>
</div>
</body>
<?php include 'asset/include/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        let jsondata = <?php echo json_encode($client_information); ?>;
        let birthday = jsondata["D.O.B"];
        let weight = jsondata["current_weight"];
        let height = jsondata["height"];
        let medical_issues = jsondata["medical_issues"];
        let date = new Date();
        let startDate = new Date(birthday);
        let newDate = date.getTime() - startDate.getTime();
        let age = Math.ceil(newDate / 1000 / 60 / 60 / 24 / 365);
        if (isNaN(age)) {
            age = "";
        }
        $("#age").html(age);
        $("#weight").html(weight);
        $("#height").html(height);
        $("#medical_issues").html(medical_issues);
    });


</script>
</html>
