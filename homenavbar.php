<!--connect file-->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-eqaiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport' content="width=device-width, initial-scale=1.0">
     <title>Ecommerce Website using PHP and MySQL.</title>
     <!--boortstrap CSS link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
     rel="stylesheet" 
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
     crossorigin="anonymous">
     <!--font awesome link -->
     <link rel="Stylesheet" herf="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>

      <!--css file-->
      <link rel="stylesheet" href="style.css">

</head>
<style>
body
{
    overflow-x:hidden;
}
</style>
<body>

     <!-- navbar -->
     <div class="container-fluid p-0">
       <!-- first child -->
       <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
        <img src="./image/logo.jpg" alt="" class="logo">
  
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="homenavbar.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php
        if(isset($_SESSION['username'])){
       echo "<li class='nav-item'>
       <a class='nav-link'  href='./users_area/profile.php'>My Account</a> 
       </li>";
        }else{
       echo "<li class='nav-item'>
       <a class='nav-link'  href='./users_area/user_registration.php'>Ragister</a> 
       </li>";
        }

        ?>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
</svg>
<sup>
  <?php
  cart_item();
  ?>
  
</sup>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:<?php total_cart_price(); ?></a>
        </li>     
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>


<!---second child--->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto">
        
        <?php
        if(!isset($_SESSION['username'])){
          echo"<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
          }else {
            echo"<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
          </li>";
          }
        if(!isset($_SESSION['username']))
        {
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_login.php'>Login</a>
          </li>";
        }
        else
        {
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>Logout</a>
          </li>";
        }
        ?>

</ul>
</nav>
<!---Third child--->
<div class="bg-light">
  <h3 class="text-center">MY STORE</h3>
  <p class="text-center">our website is the source of collection</p>
</div>

<!--fourth child-->
<div class="row px-3">
  <div class="col-md-10">
    <!--products-->
    <div class="row">
    <!--fetching products-->
    <?php
    // calling function
    cart();
    getproducts();
    get_unique_categories();
    get_unique_brands();
    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip;  
    //   $select_query="select * from products order by rand() LIMIT 0,12";
  //   $result_query=mysqli_query($con,$select_query);
  //  // $row=mysqli_fetch_assoc($result_query);
  //  //echo $row['product_title'];
  //   while($row=mysqli_fetch_assoc($result_query)){
  //     $product_id=$row['product_id'];
  //     $product_title=$row['product_title'];
  //     $product_description=$row['product_description'];
  //     $product_image1=$row['product_image1'];
  //     $product_price=$row['product_price'];
  //     $category_id=$row['category_id'];
  //     $brand_id=$row['brand_id'];
  //     echo "<div class='col-md-4 mb-2'>
  //     <div class='card'>

  //       <img src='./adminarea/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  //       <div class='card-body'>
  //       <h5 class='card-title'>$product_title</h5>
  //       <p class='card-text'>$product_description</p>
  //       <a href='#' class='btn btn-info'>Add to Cart</a>
  //       <a href='#' class='btn btn-secondary'>View More</a>
  //       </div>
  //     </div>
  //     </div>";
  //   }
    ?>
      <!--<div class="col-md-4 mb-2">
      <div class="card">

        <img src="./image/image1.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-info">Add to Cart</a>
        <a href="#" class="btn btn-secondary">View More</a>
        </div>
      </div>
      </div>-->

      <!--<div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image2.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image3.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image4.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image5.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image6.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image7.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image8.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image9.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image10.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image11.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image12.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image13.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image14.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image15.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image16.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image17.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image18.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image19.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image20.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image21.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image22.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image23.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image24.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image25.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image26.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image27.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image28.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image29.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image30.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image31.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image32.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image33.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image34.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image35.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image36.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image37.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image38.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image39.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image40.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image41.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image42.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image43.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image44.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>
      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image45.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div><div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image46.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>
      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image47.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image48.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image49.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image50.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image51.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image52.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image53.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image54.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image55.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image56.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image57.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image58.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image59.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>

      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./image/image60.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>  </div>
      </div>
      </div>-->
    <!--row end-->  
    </div>
    <!--col end-->
  </div>
    
  <div class="col-md-2 bg-secondary p-0">
    <!--categories to be displayed here-->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
      </li>
      <?php
      getcategories();
      // $select_categories="select * from categories";
      // $result_categories=mysqli_query($con,$select_categories);
      // //$row_data=mysqli_fetch_assoc($result_brands);
      // //echo $row_data['brand_title'];
      // //echo $row_data['brand_title'];
      // while($row_data=mysqli_fetch_assoc($result_categories))
      // {
      //   $category_title=$row_data['category_title'];
      //   $category_id=$row_data['category_id'];
      //   echo "<li class='nav-item'>
      //   <a href='homenavbar.php?category=$category_title' class='nav-link text-light'>$category_title</a>
      //   </li>";
      // }

      ?>
      <!-- <li class="nav-item">
        <a href="#" class="nav-link text-light">Category1</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Category2</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Category3</a>
      </li>
      <li class="nav-item"> 
        <a href="homenavbar.php?category="$category_title class="nav-link text-light">Category4</a>
      </li> -->
    </ul>
    <!--side navbar-->
    <!--brands to be displayed here-->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
      </li>
      <?php
      getbrands();
      // $select_brands="select * from brands";
      // $result_brands=mysqli_query($con,$select_brands);
      // //$row_data=mysqli_fetch_assoc($result_brands);
      // //echo $row_data['brand_title'];
      // //echo $row_data['brand_title'];
      // while($row_data=mysqli_fetch_assoc($result_brands))
      // {
      //   $brand_title=$row_data['brand_title'];
      //   $brand_id=$row_data['brand_id'];
      //   echo "<li class='nav-item'>
      //   <a href='homenavbar.php?brand=$brand_title' class='nav-link text-light'>$brand_title</a>
      //   </li>";
      // }

      ?>
      <!-- <li class="nav-item">
        <a href="#" class="nav-link text-light">Brand1</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Brand2</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Brand3</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Brand4</a>
      </li> -->
    </ul>

  </div>
</div>
 
    
<!---last child--->
<!--include footer-->
<?php 
include("includes/footer.php"); 
?> 
</div>



<!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>