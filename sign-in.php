<?php session_start();
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $uname=$_POST["user_id"];
    $pass=$_POST["pass"];
    $sql = "SELECT * FROM users WHERE (phone_number='$uname' OR email='$uname') AND password='$pass'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    // print_r($row);die;
    $count = $result->num_rows;

    
    if ($count==1 && $row['permission']==0) {

        $_SESSION["username"]=$row["first_name"];
        $_SESSION["user_id"]=$row["id"];

        header("Location: user/index.php");
    }else if($count==1 && $row['permission']==1){
        $_SESSION["username"]=$row["first_name"];
        $_SESSION["user_id"]=$row["id"];

        header("Location: business/index.php");
    }else {
    echo"<script>
        window.location.href='sign-in.php';
        </script>";
    }
    unset($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/sign-in.css?version:1.1">
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
                    <form id="myForm" name="form" method="post">
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
                            <button id="submitButton" type="button" onclick="submitForm()">Submit</button>
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
    <script>
        function submitForm(){
            let user=document.form.user_id;
            let pass=document.form.pass;
            if(user.value ===""){
                document.getElementById("massege").innerHTML = "email is require";
                user.focus();
            }
            else if(pass.value ===""){
                document.getElementById("massege").innerHTML = "password is require";
                pass.focus();
            }
            else{
                var form = document.getElementById("myForm");

                var formData = new FormData(form);

                var xhr = new XMLHttpRequest();
                xhr.open("POST", form.action, true);

                xhr.onreadystatechange = function() {
                    var button = document.getElementById("submitButton");
                    button.setAttribute("type", "submit");
                };

                xhr.send(formData);
            }
        }
    </script>

</body>
</html>