<?php
$title = "message";
include './include/header.php';
?>
<main>
    <div id="wrapper" class="home-page">
        <!-- start header -->
        <header>
            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="img/logo_1.png" alt="logo"/></a>
                    </div>
                    <div class="navbar-collapse collapse ">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li> 
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Login<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="?action=user_login">User Login</a></li>
                                    <li><a href="?action=admin_login">Administration Login</a></li>
                                </ul>
                            </li>
                            <li><a href="?action=register_new_form">Register</a></li>
                            <li><a href="?action=user_cancellation_form">Account Cancellation</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="pageTitle"></h2>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <h2>System Message</h2>
        <div class="col-lg-12">
            <h2><?php echo $message; ?></h2>
        </div>
    </div>

</main>
<?php include './include/footer.php'; ?>

