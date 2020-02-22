<?php
include("includes/db.php");

?>
<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>Insert Category</title>
<link rel="stylesheet" href="styles/styles.css" media="all" />
</head>

<body>
<form method="post" action="insert_cat.php" enctype="multipart/form-data"> 

<table width="700" align="center">
<tr>
    <td align='center'><h2>Insert New Category</h2></td>
</tr>

<tr>
    <td>Category Title</td>
    <td><input type="text" name="cat_title"></td></tr>

    <tr>
    
    
    <td><input type="submit" name="category_submit"></td></tr>




</table>




</form>
	
</body>
</html>


<?php

if(isset($_POST['category_submit']))
{
    $cat_title=$_POST['cat_title'];
    
    
   // if($product_title=='' OR $product_category=='' OR $product_type=='' OR $product_price=='' OR $product_desc=='')
    //{
    //    echo"<script>alert('Please Fill all the sections.')</script>";
    //    exit();




  //  }
   // else
    //{

    

    

   


        $insert_cat="insert into categories(cat_name) values('$cat_title')";
        $run_product=mysqli_query($con,$insert_cat);
        echo"<script>alert('Data Succesfully Saved')</script>";
        echo"<script>window.open('index.php?insert_category','_self')</script>";
   // };






    






}






?>