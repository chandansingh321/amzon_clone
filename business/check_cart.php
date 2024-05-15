<?php session_start();
include("../conn.php");
if(isset($_SESSION["username"])){
   $qty=$_GET['qty'];
   $id = $_GET['id'];
   $price=$_GET['price'];
   $total_price=$qty * $price;
   $sql="UPDATE `cart` SET `qty`= $qty,`total_amount`=$total_price WHERE `id`=$id";
   if(mysqli_query($conn,$sql)){
        echo "qty updated.";
   }else{
        echo "error. plz try again.";
   }
}
