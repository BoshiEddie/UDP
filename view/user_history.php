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
        <a href="index.php?action=history" class="active"><i class="fas fa-chart-line"></i>&nbspHistory</a>
        <a href="index.php?action=profile"><i class="fas fa-user"></i>&nbspProfile</a>
    </div>
</header>

<div class="container cont_overflow">

</div>
</body>
<?php include 'asset/include/footer.php'; ?>
</html>
