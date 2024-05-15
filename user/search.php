<?php session_start();
include("../conn.php");
if(isset($_SESSION["username"])){
   $item=$_GET['item'];
   $sql="SELECT * FROM `items` WHERE `product_name` like '%$item%'";
   $result = mysqli_query($conn,$sql);
//    echo $sql;
   $dt=array();
   if(0 < mysqli_num_rows($result)){
    while($row=$result->fetch_assoc()){
        $dt[] = $row;
   }
}else{
    $dt[] =  "'product_id' => 'error. plz try again'.";
}
echo json_encode($dt);
}