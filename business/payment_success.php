<?php
    session_start();
    include('../conn.php');
    if(!isset($_SESSION['user_id'])){
        header('Location:index.php');
        }
    $uid=$_SESSION['user_id'];
    
    $sql="SELECT * FROM cart WHERE user_id='$uid'";
    $run_query=mysqli_query($conn,$sql);
    $i=rand();
    while($cart_row=$run_query->fetch_assoc())
    {
        $cart_prod_id=$cart_row['product_id'];
        $cart_prod_title=$cart_row['product_title'];
        $cart_qty=$cart_row['qty'];
        $cart_price_total=$cart_row['total_amount'];

        $sql2="INSERT INTO `customer_order`(`user-id`, `product_id`, `product_name`, `product_price`, `product_qty`, `product_status`, `trangetion_id`) VALUES 
        ('$uid','$cart_prod_id','$cart_prod_title','$cart_price_total','$cart_qty','CONFIRMED','$i')";
        $run_query2=mysqli_query($conn,$sql2);
    }
    $i++;
    $sql3="DELETE FROM cart WHERE user_id='$uid'";
    $run_query3=mysqli_query($conn,$sql3);

	$sql="SELECT * FROM `customer_order` WHERE `user-id`='$uid'";
	$run_query=mysqli_query($conn,$sql);
	$row = $run_query->fetch_assoc();
	$trid=$row['trangetion_id'];
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Amazon</title>
    <link rel="stylesheet" href="../assests/paymet_success.css?ver=1.3">
	<style type="text/css">
		.content{
			display: none;
		}
	</style>
</head>
<body>
	<div class='content'>
		<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Amazon</a>
			</div>

			
		</div>
	</div>
	<br><br><br><br><br>
	<div class='container-fluid'>
		<div class='row'>
		<div class='col-md-2'></div>
		<div class='col-md-8'>
			<div class="panel panel-default">
  				<div class="panel-heading"><h1>Thank you!</h1></div>
  				<div class="panel-body">
    				Hello <?php echo $_SESSION['username']; ?>, your payment is successful.
    				<br>Your Transaction ID is <?php echo $trid; ?> 
    				<br>You can continue with your shopping.
    				<p></p>
    				<a href="index.php" class='btn btn-success btn-lg'>Back to store</a>
  				</div>
			</div>
		<div class='col-md-2'></div>
	</div>

	</div>

	</div>
	</div>
	<!--Pre-loader -->
	<div class="preload"><img src="../images/loading.gif" style="width:400px;
    height: 400px;
    position: relative;
    top: 0px;
    left: 469px;"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		
    	
    	$(".preload").fadeOut(5000, function(){
        $(".content").fadeIn(500);     	
		}); 

	</script>
</body>
</html>