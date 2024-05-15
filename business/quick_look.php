<?php session_start();
include("../conn.php");
include('header.php');

$id=$_GET['id'];
$sql = "SELECT * FROM `items` where `items`.`product_id`=$id ";
// print_r($sql);
// die;
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assests/quick_look.css?ver=0.4">
    <link rel="stylesheet" href="../assests/stylesheet.css?ver=0.7">
</head>
<body onload="load_count_cart();">
    <div class="quick_look">
        <div class="image_sec">
            <div class="image">
            <img src="../images/prd_categ/<?php echo $row['product_image'];?>" alt="" srcset="" class="img">
            </div>
        </div>
        <div class="details">
            <div class="sec">
                <h1>Product Name</h1>
                <div class="name_sec">
                    <p><?php echo $row['product_name'];?></p>
                </div>
            </div>
            <div class="sec">
                <h1>Description</h1>
                <div class="name_sec">
                    <p><?php echo $row['product_desc'];?></p>
                </div>
            </div>
            <div class="sec">
                <h1>Price</h1>
                <div class="name_sec">
                    <p>$<?php echo $row['product_price'];?></p>
                </div>
            </div>
        </div>
        <div class="add_to_cart">
            <button onclick="insert(<?php echo $row['product_id'];?>);">add to cart</button>
        </div>
    </div>
</body>
<script src="index.js"></script>
</html>