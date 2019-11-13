<?php
$title = 'Settings';
include 'include/header.php';
session_start();
$c = new clientDataService();
$phone_number = $_SESSION['user_session'];
$results = $c->findByPhoneNumber($phone_number);
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
        <div>
            <?php echo $results[0]['firstname'], " ", $results[0]['lastname']; ?>
            <?php echo $results[0]['D.O.B'];?>
        </div>


        <button>
            <a href="model/logout.php"><i aria-hidden="true"></i> &nbsp;Sign Out</a>
        </button>

    </div>
</body>
<?php include 'include/footer.php'; ?>
</html>