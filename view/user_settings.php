<?php
$title = 'Settings';
include 'include/header.php';

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
        </div>


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