<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>
<body>
<table width="794" align="center" bgcolor="#FFCCCC">
    <tr align="center">
        <td colspan="7"><h2>View All Categories</h2></td>
    </tr>
    <tr align="center">
    <th>Category ID</th>
    <th>Category Title</th>
    <th>Delete</th>
    <th>Edit</th>
    </tr>


    <?php
    include("includes/db.php");

    $get_cats="select * from categories";
    $run_cats=mysqli_query($con,$get_cats);
    while($row_cats=mysqli_fetch_array($run_cats)){
        $cat_id=$row_cats['cat_id'];
        $cat_title=$row_cats['cat_name'];
    
    ?>
    <tr align="center">
        <td><?php echo $cat_id; ?></td>
        <td><?php echo $cat_title; ?></td>
        <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
        <td><a href="index.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
    </tr>
    <?php } ?> 
</table>
</body>
</html>

