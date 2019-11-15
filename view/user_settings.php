<?php
$title = 'Settings';
include 'include/header.php';
session_start();
$client_information = $_SESSION['user_inform'][0];
?>
<style type="text/css">
    .nav-img{
        background-color: #E7EBFD;
        width: 100%;
        height: 20%;
    }
    .nav-img img{
        width: 80%;

        display: block;
        margin-left: auto;
        margin-right: auto;

    }
    .navbar_bottom {
        overflow: hidden;
        background-color: #E7EBFD;
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    .navbar_bottom a {
        float: left;
        display: block;
        color: #4d4f5c;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        width: 33.33333333333%;
    }

    .navbar_bottom a:hover {
        background: #f1f1f1;
        color: black;
    }

    .navbar_bottom a.active {
        background-color: #707070;
        color: white;
    }

</style>
<body>
<div class="nav-img">
    <img src="images/logo_name_fix.png">
</div>

<nav class="navbar_bottom">
    <a href="index.php?action=home">Home</a>
    <a href="index.php?action=home">Process</a>
    <a href="index.php?action=setting" class="active">Setting</a>
</nav>



<div>
    <div class="">

    </div>
    <div>
        <h2><?php echo $client_information['firstname'], " ", $client_information['lastname']; ?></h2>

        <table border="1" >
            <thead>
            <tr>My Info </tr>
            </thead>
            <tbody>
            <tr>
                <td>Age: </td>
                <td id="age"><b></b></td>
            </tr>
            <tr>
                <td>Weight: </td>
                <td id="weight"></td>
            </tr>
            <tr>
                <td>Height: </td>
                <td id="height"></td>
            </tr>
            <tr>
                <td>Medical issues: </td>
                <td id ="medical_issues"></td>
            </tr>
            </tbody>
        </table>


        <button>
            <a href="model/logout.php"><i aria-hidden="true"></i> &nbsp;Sign Out</a>
        </button>

    </div>
</body>
<?php include 'include/footer.php'; ?>
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
        let age = Math.ceil(newDate / 1000 / 60 / 60 / 24 /365);
        if (isNaN(age)){
            age = "";
        }
        $("#age").html(age);
        $("#weight").html(weight);
        $("#height").html(height);
        $("#medical_issues").html(medical_issues);
    });

</script>
</html>