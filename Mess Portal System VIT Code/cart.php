<?php
include("includes/db.php");
include("functions/functions.php");
session_start();


?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Allmess</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	     
	        <span class="oi oi-menu"></span>
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                  <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>

	          
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
   

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Remove</th>
						        <th>Image</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        
						      </tr>
							</thead>

							<form method="post" action="" >
            
								<?php
							$total=0;
				
				
				global $db;
				$ip_add=$_SESSION['customer_email'];
				
				$get_price="select * from cart where ip_add='$ip_add' and states='on'";
				$run_priceq=mysqli_query($db,$get_price);
				while($records=mysqli_fetch_array($run_priceq))
				{
				  $p_id=$records['p_id'];
				  $price_query="select * from products where product_id='$p_id'";
				  $run_price=mysqli_query($con,$price_query);
				
				   $record1=mysqli_fetch_array($run_price);
				
				  
					$price=$record1['product_price'];
				
					$price_array=array($price);
					$values=array_sum($price_array);
					$total+=$values;
					$product_title=$record1['product_title'];
					$product_image=$record1['product_img1'];


					echo"

    
							
							
						   
							
							
									
							
								
								
				
				
				
				
								


								<tbody>
									<tr class='text-center'>
									  <td class='product-remove'><input type='checkbox' name='remove[]' value='$p_id'/><span class='ion-ios-close'></span></a></td>
									  
									  <td class='image-prod'><div class='img'><img src='admin_area/product_images/$product_image' height='150' width='150'/></div></td>
									  
									  <td class='product-name'>
										  <h3>$product_title</h3>
										  
									  </td>
									  
									  <td class='price'>$price</td>
									  
									  <td class='quantity'>
										  <div class='input-group mb-3'>
										   <input type='text' name='qty' class='quantity form-control input-number' value=''>
										</div>
									</td>
									  
									  
									</tr><!-- END TR-->
	  
								   
								  </tbody>
				
















				
				
				
				
					
					
					 ";
					 

				
					 if(isset($_POST['update']))
					 {    
					 
					 if(isset($_POST['qty']))
					 {
					 $qty=$_POST['qty'];
					 
					 
					 $qtyq="update cart set qty='$qty' where p_id='$p_id' and ip_add='$ip_add' and states='on'";
					 
					

					 $qtyrun=mysqli_query($con,$qtyq);
					 
					 $total+=$values*((int)$qty-1);
					 
					 
					 
					 }
					 
					 
					 
					 
					 
					 }
				
				   
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
					 
					 
					
				}
					 
				
				
				
				
				
				
				
				
				
				
				
				
				
				
                ?>
                




                <table>
<tr>
<td><input type="submit" name="update" value="update"/> </td>
<td><input type="submit" name="checkout" value="checkout"/> </td>





</tr>
</table>











			</form>
				
			<?php




if(isset($_POST['update']))
{
    if(isset($_POST['remove']))
    {




    foreach($_POST['remove'] as $removeid)
    {
        $queryremove="delete from cart where p_id='$removeid' and ip_add='$ip_add' and states='on'";
        $queryremoverun=mysqli_query($con,$queryremove);
        if($queryremoverun)
        {
            echo "<script>window.open('cart.php','_self')</script>";


        }



    }

    
    }


    












}

if(isset($_POST['checkout']))
{


$query="select * from cart where ip_add='$ip_add'";


 $runq=mysqli_query($con,$query);
 
 while($rec=mysqli_fetch_array($runq))

 {
	

	 $pid=$rec['p_id'];
	 $quantity=$rec['qty'];
	 $orderquery="insert into orders(ip,p_id,qty) values('$ip_add','$pid','$quantity')";
	 $orderqueryrun=mysqli_query($con,$orderquery);
	 


	 













 }



$delete="delete from cart where ip_add='$ip_add'";
$rundelete=mysqli_query($con,$delete);
echo "<script>alert('Order Placed')</script>";
echo "<script>window.open('index.php','_self')</script>";










}   













?>



	
				
				
				
				
				
				
							












































						  </table>
					  </div>
    			</div>
</DIV>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    				
    						<span>Total: </span>
    						<span><?php

echo "

$total";
?></span>
    					</p>
    				</div>
    				
    			</div>
    		</div>
			</div>
		</section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"></p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2"></h2>
            	<div class="block-23 mb-3">
	              <ul>
	                
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>