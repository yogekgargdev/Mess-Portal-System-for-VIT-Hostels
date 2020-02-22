<?php
include("includes/db.php");
if(isset($_GET['edit_pro'])){
    $edit_id=$_GET['edit_pro'];
    $get_edit="select * from products where product_id='$edit_id'";
    $run_edit=mysqli_query($con,$get_edit);
    $row_edit=mysqli_fetch_array($run_edit);
    $update_id=$row_edit['product_id'];
    $p_title=$row_edit['product_title'];
    $cat_id=$row_edit['cat_id'];
    $p_type=$row_edit['type'];
    $p_img1=$row_edit['product_img1'];
   
    $p_price=$row_edit['product_price'];
    $p_desc=$row_edit['product_desc'];
    
    
}
$get_cat="select * from categories where cat_id='$cat_id'";
$run_cat=mysqli_query($con,$get_cat);
$cat_row=mysqli_fetch_array($run_cat);
$cat_edit_title=$cat_row['cat_name'];
?>
<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>Insert Product</title>
<link rel="stylesheet" href="styles/styles.css" media="all" />
</head>

<body>
<form method="post" action="" enctype="multipart/form-data"> 

<table width="700" align="center">
<tr>
    <td align='center'><h2>Edit Product</h2></td>
</tr>

<tr>
    <td>Product Title</td>
    <td><input type="text" name="product_title" value="<?php echo $p_title; ?>"</td></tr>

    <tr>
    <td>Product Category</td>
    <td>
        <select name="product_category">
            <option value="<?php echo $cat_id; ?>"><?php echo $cat_edit_title; ?></option>
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
            <option value="<?php echo $p_type; ?>"><?php echo $p_type; ?> </option>
        
            <option value=''>VEG</option>
            <option value=''>NON VEG</option>




       



        </select>

    </td></tr>


    <td>Product Price</td>
    <td><input type="text" name="product_price" value="<?php echo $p_price; ?>"></td></tr>
    
    <tr>
    <td>Product Image</td>
    <td><input type="file" name="product_image"/><img src="product_images/<?php echo $p_img1; ?>"width="80" height="80"</td></tr>

    <td>Product Description</td>
    <td><input type="text" name="product_desc" value="<?php echo $p_desc; ?>"></td></tr>
    
    <tr>
    
    <td><input type="submit" name="update_product" value="Update Product"></td></tr>




</table>




</form>
	
</body>
</html>


<?php

if(isset($_POST['update_product']))
{
    $product_title=$_POST['product_title'];
    
    $product_category=$_POST['product_category'];
    $product_type=$_POST['product_type'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $status='ON';

    $product_img=$_FILES['product_image']['name'];
    $temp_name=$_FILES['product_image']['tmp_name'];


    move_uploaded_file($temp_name,"product_images/$product_img");
    
    $update_product="update products set  cat_id='$product_category', date=NOW(),product_title='$product_title',type='$product_type',product_img1='$product_img',product_price='$product_price', product_desc='$product_desc', status='ON' where product_id='$update_id'";
    $run_update=mysqli_query($con,$update_product);
    if($update_product){
    echo"<script>alert('Product Updated Successfully')</script>";
    echo"<script>window.open('index.php?view_product','_self')</script>";
    }
  
}






?>