<?php
session_start();
$title = 'Welcome';
include 'include/header.php';

include_once 'model/database.php';
//also change sql statement here and select user name from .....
$stmt = $db->prepare("SELECT firstname, lastname FROM clients WHERE phone_number=:phone_number");
$stmt->execute(array(":phone_number" => $_SESSION['user_session']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<html>
<head>

</head>
<body>
<div class="nav bottom">
    <a href="index.php?action=home">Home</a>
    <a href="index.php?action=home">Process</a>
    <a href="index.php?action=home">Setting</a>
</div>

<div id=" content">
    <div>


        <!--change 'card_holder' to the column name here    -->
        <h1>Welcome back <?php echo $row['firstname'], " ", $row['lastname']; ?> </h1>
        <p>Here's your workout today</p>


        <div>
            <h2>Body part here</h2>
            <div>
                <span id="day"></span><span id="time"></span>
            </div>
        </div>

        <!--exercise table here-->
        <table border="1">
            <tr>
                <th>Exercise</th>
                <th>Sets</th>

            </tr>
            <tr>

                <!--
            <?php //foreach ($currencies as $currency) : ?>
                <tr>
                    <td><?php //echo $currency['currency_name']; ?></td>
                    <td><?php //echo $currency['quantity']; ?></td>
                </tr>
            <?php //endforeach; ?>
            -->
            </tr>


        </table>
    </div>
    <button>
        <a href="index.php?action=start_workout">START WORKOUT</a>
    </button>
    <br>
    <button>
        <a href="model/logout.php"><i aria-hidden="true"></i> &nbsp;Sign Out</a>
    </button>

</div>
</body>
<?php include 'include/footer.php'; ?>

<script type="text/javascript">
    window.onload = function () {
        setInterval("clock()", 1000);
    }

    function clock() {
        let d = new Date();
        let spt = document.getElementById("time");

        let month;
        switch (d.getMonth() + 1) {
            case 1:
                month = "Jan";
                break;
            case 2:
                month = "Feb";
                break;
            case 3:
                month = "Mar";
                break;
            case 4:
                month = "Apr";
                break;
            case 5:
                month = "May";
                break;
            case 6:
                month = "Jun";
                break;
            case 7:
                month = "Jul";
                break;
            case 8:
                month = "Aug";
                break;
            case 9:
                month = "Sep";
                break;
            case 10:
                month = "Oct";
                break;
            case 11:
                month = "Nov";
                break;
            default:
                month = "Dec";
        }
        spt.innerHTML = month + " " + d.getDate() + "th " + d.getFullYear() + " ";
        //+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();


        let weekday = document.getElementById("day");
        weekday.innerHTML = getWeekDate(d);

    }

    function getWeekDate(d) {
        let weeks = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Tuesday", "Friday", "Saturday");
        let week = weeks[d.getDay()];
        return week;
    }
</script>
</html>