<?php 

$db=mysqli_connect("localhost","root","","myshop");





//getting the ip address


function getRealIpAddr()
{
  if ( !empty( $_SERVER['HTTP_CLIENT_IP'] ) )
  {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  elseif( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
  //to check ip passed from proxy
  {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else
  {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}






















//viewing different items


function view()
{
global $db;



$get_products="select * from products order by rand() LIMIT 0,6";
$run_products=mysqli_query($db,$get_products);


while($row_product=mysqli_fetch_array($run_products))



{

	$product_title=$row_product['product_title'];
	$product_image=$row_product['product_img1'];
  $product_id=$row_product['product_id'];
  $price=$row_product['product_price'];



	echo"


  <div class='col-md-6 col-lg-3 ftco-animate'>
  <div class='product'>
      <a href='index.php?prod_id=$product_id' class='img-prod'><img class='img-fluid' src='admin_area/product_images/$product_image' alt='Colorlib Template'>
          <div class='overlay'></div>
      </a>
      <div class='text py-3 pb-4 px-3 text-center'>
          <h3>$product_title</h3>
          <div class='d-flex'>
              <div class='pricing'>
                  <p class='price'><span>₹ $price</span></p>
              </div>
          </div>
          <div class='bottom-area d-flex px-3'>
              <div class='m-auto d-flex'>
              <a href='index.php?prod_id=$product_id' class='buy-now d-flex justify-content-center align-items-center mx-1'>
              <span><i class='ion-ios-cart'></i></span>
          </a>

                  
              </div>
          </div>
      </div>
  </div>
</div>

   
	";

}



}

//adding items in cart

function cart()
{
    global $db
    ;
    

if(isset($_GET['prod_id']))
{
$p_id= $_GET['prod_id'];

if(isset($_SESSION['customer_email']))
{
echo $_SESSION['customer_email'];




    
   $ip_add=$_SESSION['customer_email'];

    
    




    $q="INSERT INTO cart(p_id, ip_add,qty,states) VALUES ('$p_id','$ip_add',1,'on')";

    $run_q=mysqli_query($db,$q);


}


}



}


// getting  no of items in the cart

function items()
{

global $db;
if(isset($_GET['cart']))

{
  $get_items="select * from cart where ip_add='0'";
  $run_items=mysqli_query($db,$get_items);
  $num_rows=mysqli_num_rows($run_items);






}

else
{
  $get_items="select * from cart where ip_add='0'";
  $run_items=mysqli_query($db,$get_items);
  $num_rows=mysqli_num_rows($run_items);

}


echo $num_rows;



}

// functio total price

function totalprice()
{
  $total=0;


  global $db;

  $get_price="select * from cart where ip_add='0'";
  $run_priceq=mysqli_query($db,$get_price);
  while($records=mysqli_fetch_array($run_priceq))
  {
    $p_id=$records['p_id'];
    $price_query="select * from products where product_id='$p_id'";
    $run_price=mysqli_query($db,$price_query);

     $record1=mysqli_fetch_array($run_price);

    
      $price=$record1['product_price'];
      $price_array=array($price);
      $values=array_sum($price_array);
      $total+=$values;









    
    
    

  
  
  








  }

  echo $total;







}



function categories()
{
if(isset($_GET['cat_id']))
{


 $cat=$_GET['cat_id'];


  global $db;



  $get_products="select * from products where cat_id='$cat'";
  $run_products=mysqli_query($db,$get_products);
  
  
  while($row_product=mysqli_fetch_array($run_products))
  
  
  
  {
  
    $product_title=$row_product['product_title'];
    $product_image=$row_product['product_img1'];
    $product_id=$row_product['product_id'];
    $price=$row_product['product_price'];
  
  
  
    echo"
  
  
    <div class='col-md-6 col-lg-3 ftco-animate'>
    <div class='product'>
        <a href='categories.php?prod_id=$product_id&cat_id=$cat' class='img-prod'><img class='img-fluid' src='admin_area/product_images/$product_image' alt='Colorlib Template'>
            <div class='overlay'></div>
        </a>
        <div class='text py-3 pb-4 px-3 text-center'>
            <h3>$product_title</h3>
            <div class='d-flex'>
                <div class='pricing'>
                    <p class='price'><span>₹ $price</span></p>
                </div>
            </div>
            <div class='bottom-area d-flex px-3'>
                <div class='m-auto d-flex'>
                <a href='categories.php?prod_id=$product_id&cat_id=$cat' class='buy-now d-flex justify-content-center align-items-center mx-1'>
                <span><i class='ion-ios-cart'></i></span>
            </a>
  
                    
                </div>
            </div>
        </div>
    </div>
  </div>
  
     
    ";
  
  }

























}





}

































?>















