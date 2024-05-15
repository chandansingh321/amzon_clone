<?php include("../conn.php");
    session_start();
    if(isset($_SESSION["username"])){
    $product_id=$_GET['id'];
    $uid=$_SESSION['user_id'];
    $sql1 ="SELECT * FROM `cart` WHERE `product_id`=$product_id AND `user_id`=$uid";
    // echo $sql1;
    $result = $conn->query($sql1);
    $row=$result->fetch_assoc();
    $count = $result->num_rows;
    // echo $count;
    $qty=$row['qty'];
    $price=$row['price'];
    if($count==1){
        $qty++;
        $total=$qty*$price;
        $sql3="UPDATE `cart` SET `qty`=$qty,`total_amount`=$total WHERE `product_id`=$product_id";
        mysqli_query($conn, $sql3);
    }else{
        $sql = "SELECT * FROM `items` where `items`.`product_id`=$product_id";
        echo $sql;
        $result = $conn->query($sql);
        $row=$result->fetch_assoc();
        $product_title = $row['product_name'];
        $product_image = $row['product_image'];
        $product_price = $row['product_price'];
            
        $user_id = $_SESSION["user_id"];
        // echo $_SESSION["user_id"];
        // die;
        $qty = 1;
    
        $sql="INSERT INTO `cart`(`product_id`, `user_id`, `product_title`, `pruduct_image`, `qty`, `price`, `total_amount`) VALUES 
        ('$product_id','$user_id','$product_title','$product_image','$qty','$product_price','$product_price')";
    

        mysqli_query($conn, $sql);
        // if(mysqli_query($conn, $sql)){
        //     header("Location: show_product.php?id=" . $_SESSION['CATEGID']);
        // }
    }
    }
    
?>