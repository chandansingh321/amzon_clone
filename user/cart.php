<?php session_start();
include("../conn.php");
include('header.php');
if(isset($_SESSION["username"])){
    $uid=$_SESSION["user_id"];
    $sql = "SELECT * FROM `cart` where `user_id`=$uid";
    // echo $sql;
    // die;
    $result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="../assests/cart.css?ver=2.0">
</head>
</head>
<body onload="load_count_cart();">
   <div class="cart_first">
        <div class="cart">
            <div class="cart_section">
                <div class="title">
                    <h2>Shopping Cart</h2>
                    <div class="price">
                        <p>price</p>
                    </div>
                </div>
                <?php $total_amt=0;
                    $item=0;
                ?>
                <?php $cnt = 1; ?>
                <?php while($row = $result->fetch_assoc()){?>
                <div class="product_sec">
                    <div class="image_sec">
                        <img src="../images/prd_categ/<?php echo $row['pruduct_image'];?>" alt="">
                    </div>
                   <div class="div_flex">
                        <div class="product_sec_info">
                            <div class="product_info">
                                <p><?php echo $row['product_title'];?></p>
                            </div>
                            <div class="price_sec">
                                <p>$<?php echo $row['price'];?></p>
                            </div>
                        </div>
                        <div class="edit_sec">
                            <div class="qwantity">
                                    <input type="button" value="-" onclick="dicriment('qty<?php echo $cnt;?>')">
                                    <input type="button" name="qty<?php echo $cnt;?>" id="qty<?php echo $cnt;?>" value="<?php echo $row['qty'];?>" min="0">
                                    <input type="button" value="+" onclick="incriment('qty<?php echo $cnt;?>')">
                            </div>
                            <div class="check_sec">
                                <span><div onclick="updateQty(<?php echo $row['id'];?>, document.getElementById('qty<?php echo $cnt;?>').value, msg<?php echo $cnt;?>, <?php echo $row['price'];?>);"><i class="fa-solid fa-circle-check"></i></div></span>
                            </div>
                            <div class="delete_sec">
                                <span><a href="delete_item_cart.php?id=<?php echo $row['id'];?>"><i class="fa-solid fa-trash-can"></i></a></span> 
                            </div>
                        </div>
                        <div id="msg<?php echo $cnt;?>"></div>
                   </div>
                </div>
                <?php $item+=1;
                $total=$row['total_amount'];
                $price_array=array($total);
                $total_sum=array_sum($price_array);
                $total_amt+=$total_sum;
                $cnt++;?>
                <?php } ?>
                <div class="subtotal_sec">
                    <p>Subtotal (<?php echo $item?> items): $<?php echo $total_amt?></p>
                </div>
            </div>
            
            <div class="process_section">
                <div class="total">
                    <p>Subtotal (<?php echo $item?> items): $<?php echo $total_amt?></p>
                </div>
                <div class="total">
                    <button><a href="payment_success.php">proceed to checkout</a></button>
                </div>
            </div>
        </div>
   </div>
   <script src="index.js"></script>
   <?php }else{
    header("Location: sign-in.php");
   } ?>
</body>
</html>