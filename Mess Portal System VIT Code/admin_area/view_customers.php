<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<style type="text/css">
th,tr{border:3px groove #333}
</style> 
</head>
<body>
    <table width="794" align="center" bgcolor="#FFCC99">
        <tr align="center">
            <td colspan="6"><h2>View All Customers</h2></td>

        </tr>
        <tr align="center">
            <th>S.N</th>
            <th>Name</th>
            <th>Email</th>
            <th>Block</th>
            <th>Delete</th>
        </tr>

        <?php
        include("includes/db.php");
        $get_c="Select * from customers";
        $run_c=mysqli_query($con,$get_c);

        while($row_c=mysqli_fetch_array($run_c)){
            $c_id=$row_c['customer_id'];
            $c_name=$row_c['customer_name'];
            $c_email=$row_c['customer_email'];
            $c_block=$row_c['customer_block'];
        
        ?>

        <tr align="center">
            <td><?php echo $c_id; ?></td>
            <td><?php echo $c_name; ?></td>
            <td><?php echo $c_email; ?></td>
            <td><?php echo $c_block; ?></td>
            
            <td><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
