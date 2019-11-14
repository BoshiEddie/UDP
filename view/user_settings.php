<?php
$title = 'Settings';
include 'include/header.php';
session_start();
$client_information = $_SESSION['user_inform'][0];
echo json_encode($client_information);
?>
<html>
<head>

</head>
<body>
<div class="nav bottom">
    <a href="index.php?action=home">Home</a>
    <a href="index.php?action=home">Process</a>
    <a href="index.php?action=setting">Setting</a>
</div>

<div id=" content">
    <div>
        <h2><?php echo $client_information['firstname'], " ", $client_information['lastname']; ?></h2>

        <table border="1">
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