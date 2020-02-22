<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="refresh" content="2"/>
<title>Untitled Document</title>
<style type="text/css">
th,tr{border:3px groove #333}
</style> 
</head>
<body>
    <table width="794" align="center" bgcolor="#FFCC99">
        <tr align="center">
            <td colspan="7"><h2>View All Orders</h2></td>

        </tr>
        <tr align="center">
           
            <th>Customer</th>
            
            <th>Product ID</th>
            <th>QTY</th>
            
            <th>Delete</th>

        </tr>

        <?php
        include("includes/db.php");
        $get_orders="Select * from orders";
        $run_orders=mysqli_query($con,$get_orders);

        while($row_orders=mysqli_fetch_array($run_orders)){
          $order_id=$row_orders['Order_id'];

          $c_id=$row_orders['ip'];
          
          $p_id=$row_orders['p_id'];
          $qty=$row_orders['qty'];
          
        
        ?>

        <tr align="center">
            
            <td><?php echo $c_id; ?></td>
            
            <td><?php echo $p_id; ?></td>
            <td><?php echo $qty; ?></td>
            

            <td><a href="delete_order.php?delete_order=<?php echo $order_id; ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
