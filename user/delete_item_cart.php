<?php session_start();
include("../conn.php");
if(isset($_SESSION["username"])){
    $id=$_GET['id'];
    $sql = "DELETE FROM `cart` WHERE `id`=$id";
    if(mysqli_query($conn,$sql)){
        header("location:cart.php");
    }

}
?>