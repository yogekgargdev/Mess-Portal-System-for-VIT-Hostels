<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php
if(isset($_GET['view_products'])) ?> {
    <table align="center" width="794">
        <tr align="center">
            <td colspan="7"><h2>View All Products</h2></td>
        </tr>

        <tr>
            <th>Product id</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Price</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>

        <?php
        include("includes/db.php");
        $get_pro="select * from products";
        $run_pro=mysqli_query($con,$get_pro);
        while($row_pro=mysqli_fetch_array($run_pro)){
            $p_id=$row_pro['product_id'];
            $p_title=$row_pro['product_title'];
            $p_img=$row_pro['product_img1'];
            $p_price=$row_pro['product_price'];
            $p_description=$row_pro['product_desc'];
            
        
        ?>

        <tr align="center">
            <td><?php echo $p_id;?></td>
            <td><?php echo $p_title;?></td>
            <td><img src="product_images/<?php echo $p_img;?>"width="60" height="60"></td>
            <td><?php echo $p_price;?></td>
            <td><?php echo $p_description;?></td>
            <td><a href="index.php?edit_pro=<?php echo $p_id; ?>">Edit</a></td>
            <td><a href="delete_pro.php?delete_pro=<?php echo $p_id;?>">Delete</a></td>
        </tr>
        
        <?php } ?>

    </table>
   
     }
 
</body>
</html>