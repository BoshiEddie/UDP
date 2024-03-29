/*
 Author: Pradeep Khodke
 URL: http://www.codingcage.com/
 */

//login
$('document').ready(function () {
    /* validation */
    $("#login-form").validate({
        rules:
            {
                password: {
                    required: true,
                },
                register_numebr: {
                    required: true,
                },
            },
        messages:
            {
                password: {
                    required: "please enter your password"
                },
                register_numebr: "please enter your register number",
            },
        submitHandler: submitForm
    });
    /* validation */

    /* login submit */
    function submitForm() {
        var data = $("#login-form").serialize();

        $.ajax({

            type: 'POST',
            url: 'model/login_process.php',
            data: data,
            beforeSend: function () {
                $("#error").fadeOut();
                $("#btn-login").html('sending ...');
            },
            success: function (response) {
                if (response == "ok") {

                    $("#btn-login").html(
                        '<div class="spinner-border text-success ;" role="status">\n' +
                        ' <span class="sr-only">Loading....</span>\n' +
                        '</div> Signing    In ...');
                    setTimeout(' window.location.href = "index.php?action=home"; ', 2000);
                } else {

                    $("#error").fadeIn(1000, function () {
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + ' !</div>');
                        $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                    });
                }
            }
        });
        return false;
    }
});

let d = new Date();
let date_instored;

//current time
function current_time() {
    Date.prototype.format = function (fmt) { //author: meizz
        let o = {
            "M+": this.getMonth() + 1,
            "d+": this.getDate(),
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (let k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    }
    date_instored = d.format("yyyy-MM-dd");
    console.log(date_instored);

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

    let weeks = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Tuesday", "Friday", "Saturday");
    let week = weeks[d.getDay()];

    spt.innerHTML = week + " " + month + " " + d.getDate() + "th " + d.getFullYear() + " ";
}

//timmer
let totalCount = 0;

function timer() {
    //console.log("timer working");

    function $(id) {
        return document.getElementById(id)
    }

    let count = 0;
    let timer = null;
    timer = setInterval(function () {
        count++;
        $("id_S").innerHTML = showNum(count % 60);
        $("id_M").innerHTML = showNum(parseInt(count / 60) % 60);
        $("id_H").innerHTML = showNum(parseInt(count / 60 / 60));
    }, 1000);


    $("start").onclick = function () {
        timer = setInterval(function () {
            count++;
            $("id_S").innerHTML = showNum(count % 60);
            $("id_M").innerHTML = showNum(parseInt(count / 60) % 60);
            $("id_H").innerHTML = showNum(parseInt(count / 60 / 60));
        }, 1000)
    };
    $("pause").onclick = function () {
        clearInterval(timer)
    };

    function showNum(num) {
        if (num < 10) {
            return '0' + num
        }
        return num
    };

    $("finish_workout").onclick = function () {
        $("pause").onclick();
        totalCount = count;
        count = 0;
        $("id_S").innerHTML = "00";
        $("id_M").innerHTML = "00";
        $("id_H").innerHTML = "00";
        saveTime(totalCount);
    };
}

function saveTime(t) {
    alert(t);
};