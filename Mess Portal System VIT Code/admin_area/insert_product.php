<?php
include("includes/db.php");

?>
<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>Insert Product</title>
<link rel="stylesheet" href="styles/styles.css" media="all" />
</head>

<body>
<form method="post" action="insert_product.php" enctype="multipart/form-data"> 

<table width="700" align="center">
<tr>
    <td align='center'><h2>Insert New Product</h2></td>
</tr>

<tr>
    <td>Product Title</td>
    <td><input type="text" name="product_title"></td></tr>

    <tr>
    <td>Product Category</td>
    <td>
        <select name="product_category">
            <option>Select Product Category</option>
            <?php

            $get_cats="select * from categories";
            $run_cats=mysqli_query($con,$get_cats);
            while($row_cats=mysqli_fetch_array($run_cats))

        {
            $cat_id=$row_cats['cat_id'];
            $cat_title=$row_cats['cat_name'];
            echo"<option value='$cat_id'>$cat_title</option>";




        }
        ?>



        </select>

    </td></tr>

    <tr>
    <td>Type(Veg or Non-Veg)</td>
    <td>
        <select name="product_type">
            <option>SELECT</option>
        
            <option value=''>VEG</option>
            <option value=''>NON VEG</option>




       



        </select>

    </td></tr>


    <td>Product Price</td>
    <td><input type="text" name="product_price"></td></tr>
    
    <tr>
    <td>Product Image</td>
    <td><input type="file" name="product_image"></td></tr>

    <td>Product Description</td>
    <td><input type="text" name="product_desc"></td></tr>
    
    <tr>
    
    <td><input type="submit" name="product_submit"></td></tr>




</table>




</form>
	
</body>
</html>


<?php

if(isset($_POST['product_submit']))
{
    $product_title=$_POST['product_title'];
    
    $product_category=$_POST['product_category'];
    $product_type=$_POST['product_type'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $status='ON';

    $product_img=$_FILES['product_image']['name'];
    $temp_name=$_FILES['product_image']['tmp_name'];
   // if($product_title=='' OR $product_category=='' OR $product_type=='' OR $product_price=='' OR $product_desc=='')
    //{
    //    echo"<script>alert('Please Fill all the sections.')</script>";
    //    exit();




  //  }
   // else
    //{

    

    

   

        move_uploaded_file($temp_name,"product_images/$product_img");

        $insert_product="insert into products(cat_id,date,product_title,type,product_img1,product_price,product_desc,status) values('$cat_id',NOW(),'$product_title','$product_type','$product_img','$product_price','$product_desc','$status')";
        $run_product=mysqli_query($con,$insert_product);
        echo"<script>alert('Data Succesfully Saved')</script>";
        echo"<script>window.open('index.php?insert_product','_self')</script>";
   // };






    






}






?>