
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assests/stylesheet.css?ver=0.9">
    <title>Document</title>
</head>
<body onload="load_count_cart();">
    <header>
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
                <input placeholder="search Amazon" class="search-input " id="search">
                <div class="search-icon">
                    <i class="fa-solid fa-magnifying-glass" onclick="search()"></i>
                </div>
          </div>

          <div class="nav-singin border" onclick="window.location.href='sign-in.php'">
            <div>
               <p><span>Hello,sign-in</span></p>
            </div>
            <p class="acc-list">Account & Lists</p>
          </div>

          <div class="nav-return border">
            <a href="sign-in.php">
                <div>
                    <p><span>Returns</span></p>
                </div>
                <p class="nav-order">& Orders</p>
            </a>
         </div>

         <div class="nav-card border" >
                <a href="sign-in.php">
                    <div class="number">
                        <i class="fa-solid fa-cart-shopping"></i>
                        
                        <div class="cart_first">
                            <p id="count_cart"></p>
                            <p>cart</p>
                        </div>
                    </div>
                   
                </a>
         </div>
         <!-- <div class="add_product">
            <p><a href="add_product.php">add product</a></p>
         </div> -->

        </div>

        <div class="panel">
            <!-- <div class="panel-all border">
                <i class="fa-solid fa-bars"></i>
                All
            </div>
            <div class="panel-ops">
                <p class="border">Today's Deals</p>
                <p class="border">Customer Service</p>
                <p class="border">Registry</p>
                <p class="border">Gift Cards</p>
                <p class="border">Sell</p>
            </div> -->

        </div>
    </header>
    <script>src="index.js"></script>
</body>
</html>