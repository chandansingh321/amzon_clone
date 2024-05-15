<?php session_start();
include '../conn.php';
include('header.php');
$sql = "SELECT * FROM prod_category where STATUS = 1";
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
    <link rel="stylesheet" href="../assests/stylesheet.css?ver=0.9">
</head>
<body onload="load_count_cart();">

    <!-- <header>
        <div class="navbar">
          <div class="nav-logo border">
            <a href="index.php"><div class="logo"></div></a>
          </div>

          <div class="nav-address border">
             <p class="add-first">Deliver to</p>
             <div class="add-icon">
                 <i class="fa-solid fa-location-dot"></i>
                 <p class="add-second">India</p>
             </div>
          </div>

          <div class="nav-search">
                <select class="search-select" >
                    <option>All</option>
                </select>
                <input placeholder="search Amazon" class="search-input">
                <div class="search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
          </div>

          <div class="nav-singin border" onclick="window.location.href='sign-in.php'">
            <div>
               <p><span>Hello,<?php echo $k = $_SESSION["username"]? $_SESSION["username"]: "sign-in"?></span></p>
            </div>
            <p class="acc-list">Account & Lists</p>
          </div>

          <div class="nav-return border">
            <div>
                  <p><span>Returns</span></p>
            </div>
            <p class="nav-order">& Orders</p>
         </div>

         <div class="nav-card border" >
                <a href="cart.php">
                    <div class="number">
                        <i class="fa-solid fa-cart-shopping"></i>
                        
                        <div class="cart_first">
                            <p><?php echo $count;?></p>
                            <p>cart</p>
                        </div>
                    </div>
                   
                </a>
         </div>
         <div class="add_product">
            <p><a href="add_product.php">add product</a></p>
         </div>

        </div>

        <div class="panel">
            <div class="panel-all border">
                <i class="fa-solid fa-bars"></i>
                All
            </div>
            <div class="panel-ops">
                <p class="border">Today's Deals</p>
                <p class="border">Customer Service</p>
                <p class="border">Registry</p>
                <p class="border">Gift Cards</p>
                <p class="border">Sell</p>
            </div>

        </div>
    </header> -->

   <div id="searchhere" class="display">
        <div class="hero-section" >
            <div class="hero-msg">
                <p >You are on amazon.com. You can also shop on Amazon India for millions of products with fast local delivery. <a> Click here to go to amazon.in</a></p>
            </div>

        </div>

        <div class="shop-section">
            <?php while($row = $result->fetch_assoc()){?>
                <div class="box1 box">
                    <div class="box-content">
                        <a href="show_product.php?id=<?php  echo $row['CATIGIDD'];?>"><h2><?php echo $row['CATEG_NAME'];?></h2>
                        <div class="bg-image" > <img src="../images/prd_categ/<?php echo $row['CATE_IMG'];?>" alt=""></div>
                        <p>see more</p></a>
                    </div>
                </div>
            <?php } ?>
                    
        </div>
   </div>
    <footer >
        <div class="foot-panel1">
            <a href="index.php"><p>Back to Top</p></a>
        </div>
        <!-- <div class="foot-panel2">
            <ul>
                <p>Get to Know Us</p>
                <a>Careers</a>
                <a>Blog</a>
                <a>About Amazon</a>
                <a>Investor Relations</a>
                <a>Amazon Devices</a>
                <a>Amazon Science</a>
            </ul>
            <ul>
                <p>Get to Know Us</p>
                <a>Careers</a>
                <a>Blog</a>
                <a>About Amazon</a>
                <a>Investor Relations</a>
                <a>Amazon Devices</a>
                <a>Amazon Science</a>
            </ul>
            <ul>
                <p>Get to Know Us</p>
                <a>Careers</a>
                <a>Blog</a>
                <a>About Amazon</a>
                <a>Investor Relations</a>
                <a>Amazon Devices</a>
                <a>Amazon Science</a>
            </ul>
            <ul>
                <p>Get to Know Us</p>
                <a>Careers</a>
                <a>Blog</a>
                <a>About Amazon</a>
                <a>Investor Relations</a>
                <a>Amazon Devices</a>
                <a>Amazon Science</a>
            </ul>
        </div>
        <div class="foot-panel3">
            <div class="panel1">
                <div class="amazon-logo"></div>
                <div class="world-icon">
                    <i class="fa-solid fa-globe"></i>
                    English
                </div>
                <div class="dollar-icon">
                    <span>$</span>
                    USD-U.S. Dollar
                </div>
                <div class="flag-icon">
                    <div class="us-flag"></div>
                    United States
                </div>
            </div>
        </div> -->
    </footer>

</body>
<script src="index.js"></script>
</html>