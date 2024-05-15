<?php
include 'conn.php';

if(isset($_POST['submit'])){
    $first_name     =  $_POST['first_name']??"";
    $last_name      = $_POST['last_name']??"";
    $email          = $_POST['email']??"";
    $mo_number      = $_POST['mo_number']??"";
    $pass           =  $_POST['pass']??"";
    $re_pass        = $_POST['re_pass'];
    $role           = $_POST['cmbRole'];
    if($role == 'Business'){
        $perm = 0;
    } else {
        $perm = 1;
    }
    // echo $perm;
    // die;



    $sql="INSERT INTO `users`(`email`, `password`, `first_name`, `last_name`, `phone_number`, `role`, `permission`) VALUES ('$email','$pass','$first_name','$last_name','$mo_number','$role','$perm')";
    if($pass!=$re_pass){
        echo"<script> alert('passsword is not same')</script>";
    }
    else if(mysqli_query($conn, $sql)){
        echo "<script>alert('data inserted successfully')</script>";
        header("location:sign-in.php");

    } else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
    } 
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/sign-in.css?ver=1.1">
    <title>Create account</title>
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
                    <form action="" method="post">
                        <div class="sign">
                            <h2>Create account</h2>
                        </div>
                        <div class="Email">
                            <p>First Name</p>
                            <input  type="text" name="first_name" id="first_name">
                        </div>
                        <div class="Email">
                            <p>Last Name</p>
                            <input  type="text" name="last_name" id="last_name">
                        </div>
                        <div class="Email">
                            <p>mobile number</p>
                            <input  type="text" name="mo_number" id="mo_number">
                        </div>
                        <div class="Email">
                            <p>Email</p>
                            <input  type="text" name="email" id="email">
                        </div>
                        <div class="Email">
                            <p> Password</p>
                            <input type="password" name="pass" id="pass">
                        </div>
                        <p class="alert"> Passwords must be at least 6 characters.</p>
                        <div class="Email">
                            <p>Re-enter password</p>
                            <input type="password" name="re_pass" id="re_pass">
                        </div>
                        <div class="Email">
                            <p>Select your role</p>
                            <select name="cmbRole" id="product_cate">
                                <option value="Business">Business</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="cont-bt">
                            <button type="submit" name="submit" >continue</button>
                        </div>
                        <div class="condition">
                            <p>By continuing, you agree to Amazon's <a href="">Conditions of Use</a> and <a href="">Privacy Notice .</a></p>
                        </div>
                        <hr>
                        <div class="sign-in">
                            <p>Already have an account? <a href="sign-in.php">Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <
       </div>
    </div>
</body>
</html>