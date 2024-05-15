<?php
include '../conn.php';
$sqli = "SELECT * FROM `prod_category`";
$result = $conn->query($sqli);
function uploadImage($file, $targetDirectory) {
    // Check if file upload is successful
    // if ($file['error'] !== UPLOAD_ERR_OK) {
    //     return array('success' => false, 'message' => 'File upload failed.');
    // }

    // Check file type (optional)
    $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');
    if (!in_array($file['type'], $allowedTypes)) {
        return array('success' => false, 'message' => 'Invalid file type. Only JPG, PNG, and GIF files are allowed.');
    }

    // Check file size (optional)
    // $maxFileSize = 5 * 1024 * 1024; // 5 MB
    // if ($file['size'] > $maxFileSize) {
    //     return array('success' => false, 'message' => 'File size exceeds the maximum limit of 5MB.');
    // }

    // Generate unique filename to avoid conflicts
    $fileName = uniqid() . '_' . $file['name'];

    // Move the uploaded file to the target directory
    if (move_uploaded_file($file['tmp_name'], $targetDirectory . '/' . $fileName)) {
        return array('success' => true, 'message' => 'File uploaded successfully.', 'file_name' => $fileName);
    } else {
        return array('success' => false, 'message' => 'Failed to move uploaded file.');
    }
}

if(isset($_POST['submit'])){
    $product_name      =  $_POST['product_name']??"";
    $product_desc      = $_POST['product_desc']??"";
    $product_price     = $_POST['product_price']??"";
    $product_cate      = $_POST['product_cate']??"";
    $product_file      =  $_FILES['product_file']??"";

   // Example usage
    if (isset($product_file)) {
        $uploadResult = uploadImage($product_file, '../images/prd_categ');
        if ($uploadResult['success']) {
            echo 'Image uploaded successfully. File name: ' . $uploadResult['file_name'];
        } else {
            echo 'Error: ' . $uploadResult['message'];
        }
    }
    $uploadedFileName=$uploadResult['file_name'];
    // echo "$uploadResult";
    // die;
    $sql="INSERT INTO `items`(`product_name`, `product_desc`, `product_image`,`product_price`, `product_cate`) VALUES ('$product_name','$product_desc','$uploadedFileName','$product_price','$product_cate')";
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('data inserted successfully')</script>";
        header("location:add_product.php");

    } else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
    } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/sign-in.css?version:1.6">
    <title>Document</title>
</head>
<body>
<div class="container">
       <div class="image">
            <div class="amazon-logo">
                <a href="index.php"> <img src="../images/amazon-logo-sing.jpg" alt=""></a>
            </div>
       </div>
       <div class="supper-box">
            <div class="main-box">
                <div class="box">
                    <form id="myForm" name="form" method="post"  enctype="multipart/form-data">
                        <div>
                            <p id="massege"></p>
                        </div>
                        <div class="sign">
                            <h2>Add product</h2>
                        </div>
                        <div class="Email">
                            <p>Product Name</p>
                            <input  type="text" name="product_name" id="product_name" require>
                        </div>
                        <div class="Email"> 
                            <p> Description</p>
                            <input type="text" name="product_desc" id="description" require>
                        </div>
                        <div class="Email"> 
                            <p> Price</p>
                            <input type="text" name="product_price" id="product_price" require>
                        </div>
                        <div class="Email"> 
                            <p> categories</p>
                            <select name="product_cate" id="product_cate">
                            <?php while($row = $result->fetch_assoc()){?>
                                <option value=<?php echo $row['CATIGIDD'];?>><?php echo $row['CATEG_NAME'];?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="Email">
                            <p> Insert product image</p> 
                            <input type="file" name="product_file" id="product_file">
                        </div>
                        <div class="cont-bt">
                            <button id="submitButton" type="button" name="submit" onclick="submitForm()">Add product</button>
                        </div>
                    </form>
                </div>
            </div>
       </div>
    </div>
    <script>
        function submitForm(){
            let product_name=document.form.product_name;
            let product_desc=document.form.product_desc;
            let product_price=document.form.product_price;
            let product_file=document.form.product_file;
            if(product_name.value ===""){
                document.getElementById("massege").innerHTML = "product name is require";
                product_name.focus();
            }
            else if(product_desc.value ===""){
                document.getElementById("massege").innerHTML = "Description is require";
                product_desc.focus();
            }
            else if(product_price.value ===""){
                document.getElementById("massege").innerHTML = "price is require";
                product_price.focus();
            }
            else if(product_file.value ===""){
                document.getElementById("massege").innerHTML = "product image is require";
                product_file.focus();
            }
            else{
                var form = document.getElementById("myForm");

                var formData = new FormData(form);

                var xhr = new XMLHttpRequest();
                xhr.open("POST", form.action, true);

                xhr.onreadystatechange = function() {
                    var button = document.getElementById("submitButton");
                    button.setAttribute("type", "submit");
                };

                xhr.send(formData);
            }
        }
    </script>
</body>
</html>