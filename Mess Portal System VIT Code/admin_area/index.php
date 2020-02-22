<?php
session_start();
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else{


?>

<!dOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>

<link rel="stylesheet" href="styles/styles.css" media="all" />
</head>
<body>

<div class="wrapper">
       <div class="header"></div>
       
       <div class="right">
       <h2>Manage Content</h2>
       <a href="index.php?insert_product">Insert New Item</a>
       <a href="index.php?view_product">View All Items</a>
       
       <a href="index.php?view_category">View All Categories</a>
       <a href="index.php?view_customers">View Customers</a>
       <a href="index.php?view_orders">View Orders</a>
       
       
       <a href="logout.php">Admin Logout</a>
       </div>

       <div class="left">
           <h2 style="color:red; text-align:center; padding:20px;"><?php echo @$_GET['logged_in']; ?></h2>
       <?php
           include("includes/db.php");
           if(isset($_GET['insert_product'])){
            include("insert_product.php");
           }
           
           if(isset($_GET['view_product'])){
            include("view_product.php");
           }
           if(isset($_GET['edit_pro'])){
            include("edit_pro.php");
           }

          

           if(isset($_GET['view_category'])){
            include("view_cats.php");
           }

           if(isset($_GET['edit_cat'])){
            include("edit_cat.php");
           }

           if(isset($_GET['delete_cat'])){
            include("delete_cat.php");
           }

           if(isset($_GET['view_customers'])){
            include("view_customers.php");
           }

           if(isset($_GET['view_orders'])){
            include("view_orders.php");
           }
        ?>
       </div>

     

    </div>

       

      
       
</body>
</html>
<?php } ?>