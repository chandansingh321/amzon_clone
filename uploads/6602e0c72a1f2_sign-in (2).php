<?php session_start();
include 'conn.php';

if (isset($_POST['submit'])) {

    $uname=$_POST["user_id"];
    $pass=$_POST["pass"];
    $sql = "SELECT * FROM user WHERE user_id='$uname' AND pass='$pass'";
    $result = $conn->query($sql);

    //print_r($result);die;

    

    $fetchData =  $result->fetch_assoc();

    $count = $result->num_rows;

    
    if ($count==1) {
        $_SESSION["username"]=$fetchData["username"];

        echo "Logged in!";
        header("Location: index.php");

    }else{

        echo("<script>
            alert('email and password is wrong...');
            window.location.href=sign-in.php;
            </script>");
    }
    unset($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign-in.css?version:1.1">
    <script>
        function valiSign(){

        let user=document.forms.user_id;
        if(user.value ===""){
            alert("hello");
            document.getElementById("massege").innerHTML = "email is require";
            user.focus();
        }
}
    </script>
    <title>sing-in</title>

</head>
<body>
    <div class="container">
       <div class="image">
            <div class="amazon-logo">
                <a href=""></a>
            </div>
       </div>
       <div class="supper-box">
            <div class="main-box">
                <div class="box">
                    <form name="form" method="post">
                        <div>
                            <p id="massege"></p>
                        </div>
                        <div class="sign">
                            <h2>Sign in</h2>
                        </div>
                        <div class="Email">
                            <p>Email or mobile phone number</p>
                            <input  type="text" name="user_id" id="user_id">
                        </div>
                        <div class="Email"> 
                            <p> Password</p>
                            <input type="password" name="pass" id="pass">
                        </div>
                        <div class="cont-bt">
                            <button name="submit" type="button" onclick="valiSign();">continue</button>
                        </div>
                        <div class="condition">
                            <p>By continuing, you agree to Amazon's <a href="">Conditions of Use</a> and <a href="">Privacy Notice .</a></p>
                        </div>
                        <div class="help">
                            <details>
                                <summary><a href="">Need help?</a></summary>
                                <a href="">forget password?</a>
                                <p><a href="">Other issues with Sign-In</a></p>
                            </details>
                        </div>
                        <div class="hedding">
                            <h2><span>New to Amazon?</span></h2>
                        </div>
                        <div class="create-btn">
                            <input  type="button" value="Create your Amazon account" onclick="window.location.href='create-newaccount.php'">
                        </div>
                    </form>
                </div>
            </div>
            <
       </div>
    </div>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>