<?php session_start();
include "../conn.php";

if(isset($_SESSION["user_id"])){
    
    $uid=$_SESSION["user_id"];
    $sql = "SELECT * FROM `cart` where `user_id`=$uid";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    }else{
    $count=0;
    }

    echo "<div style='background:#f00; color:#ff0; padding: 2px; font-weight bold; border-radius: 10px; text-align: center'>".$count."</div>";