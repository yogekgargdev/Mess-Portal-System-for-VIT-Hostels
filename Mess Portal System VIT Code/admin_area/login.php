<?php
session_start();
include("includes/db.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="login.css" media="all" />
</head>
<body>
<div class="login">
    <h1>Admin Login</h1>
    <form method="post">
    <input type="text" name="admin_email" placeholder="Email" required="required">  
  <input type="password" name="p" placeholder="Password" required="required">  
  <a href="#" class="forgot">forgot password?</a>
  <input type="submit" name="login" value="Admin Login">
</div>
<h2 style="color:blue; text-align:center; padding:20px;"><?php echo @$_GET['logout']; ?></h2>
</body>
</html>

<?php
if(isset($_POST['login'])){
    $user_email=$_POST['admin_email'];
    $user_pass=$_POST['p'];
    $sel_admin="select * from admins where admin_email='$user_email' and password='$user_pass'";
    $run_admin=mysqli_query($con,$sel_admin);
    $check_admin=mysqli_num_rows($run_admin);
    if($check_admin==1){
        $_SESSION['admin_email']=$user_email;
        echo "<script>window.open('index.php?logged_in=You successfully logged in!','_self')</script>";

    }
    else{
        echo "<script>alert('Admin Email or Password is incorrect,try again')</script>";
    }

}
?>
