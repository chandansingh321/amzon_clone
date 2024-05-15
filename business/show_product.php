<?php session_start();
if(isset($_SESSION["username"])){
include '../conn.php';
include('header.php');

if ($_GET['id']) {
    $id = $_GET['id'];
    $_SESSION['CATEGID'] = $id;
}
$sql = "SELECT * FROM `items` where `items`.`product_cate`=$id";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assests/stylesheet.css?ver=2.0">

</head>
<body onload="load_count_cart();">
    <!-- <h1>product</h1> -->
    <div id="display">

    </div>
    <div class="main">
        <!-- <div class="filterbox">
            <h1>category</h1>
            <div class="categorylist">
                <label for="">
                    <input type="checkbox" name="" id="">mens
                </label>
                <label for="">
                    <input type="checkbox" name="" id="">mens
                </label>
                <label for="">
                    <input type="checkbox" name="" id="">mens
                </label>
                <label for="">
                    <input type="checkbox" name="" id="">mens
                </label>
                <label for="">
                    <input type="checkbox" name="" id="">mens
                </label>
            </div>
        </div> -->
        <div class="productbox">
            <!-- <h1>main product</h1> -->
            <div class="shop-section">
                <?php while($row = $result->fetch_assoc()){?>
                <div class="box1 box">
                    <div class="box-content">
                        <h2><?php echo $row['product_name'];?></h2>
                        <div class="bg-image"> <img src="../images/prd_categ/<?php echo $row['product_image'];?>" alt=""></div>
                        <div class="button_sec">
                            <button type="button"onclick="insert(<?php echo $row['product_id'];?>)">add to cart</button>
                            <a href="quick_look.php?id=<?php echo $row['product_id'];?>"><button type="button"> quick look</button></a>

                        </div>                        <!-- <p>see more</p> -->
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
    <!-- <div class="hero-section">
        <div class="hero-msg">
            <p>You are on amazon.com. You can also shop on Amazon India for millions of products with fast local delivery. <a> Click here to go to amazon.in</a></p>
        </div>
    </div> -->
<script src="index.js"></script>
</body>
</html>
<?php } else {
    header("Location: sign-in.php");
}
?>