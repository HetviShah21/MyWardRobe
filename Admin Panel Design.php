<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-compatibloe" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin Dashboard</title>
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
     rel="stylesheet" 
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
     crossorigin="anonymous">

     <!--font awesome link-->
     <link rel="Stylesheet" herf="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>

     <!-- css file -->
     <link rel="stylesheet" href="../Style.css">
     <style>
     .admin_image{
      width: 100px;
      object-fit: contain;
      }
     .footer{
        position:absolute;
        bottom:0;
     }
     body{
      overflow-x:hidden;
     }
     .product_img
     {
      width:100px;
      object-fit: contain;
     }
    </style>
</head>
<body>
     <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first child -->
       <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../image/logo.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav me-auto">
                    <?php
        if(!isset($_SESSION['admin_name'])){
          echo"<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
          }else {
            echo"<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome ".$_SESSION['admin_name']."</a>
          </li>";
          }
        if(!isset($_SESSION['admin_name']))
        {
          echo"<li class='nav-item'>
          <a class='nav-link' href='./adminarea/admin_login.php'>Login</a>
          </li>";
        }
        else
        {
          echo"<li class='nav-item'>
          <a class='nav-link' href='./adminarea/logout.php'>Logout</a>
          </li>";
        }
        ?>
                    </ul>
                </nav>
            </div>
       </nav>
          <!-- Second child -->
          <div class="bg-light">
               <h3 class="text-center p-2">Manage Details</h3>
          </div>
         <!-- third child -->
         <div class="row">
             <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
               <div class="p-5">
                  <a href="#"><img src="../image/logo.jpg"alt="" class="admin_image"></a>
                  <p class="text-light text-center">HETVI</p>
               </div>
                  <!--div*10>a.nav-link text-light bg-info.my-1-->

                 <div class="button text-center">
                  <button class="my-3"><a href="insert product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                  <button><a href="Admin Panel Design.php?view_products" class="nav-link text-light bg-info my-1">View products</a></button>
                  <button><a href="Admin Panel Design.php?Insert_Category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                  <button><a href="Admin Panel Design.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                  <button><a href="Admin Panel Design.php?Insert_Brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                  <button><a href="Admin Panel Design.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                  <button><a href="Admin Panel Design.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                  <button><a href="Admin Panel Design.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
                  <button><a href="Admin Panel Design.php?list_users" class="nav-link text-light bg-info my-1">list Users</a></button>
                  <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                    
                 </div>
             </div>
     </div>

     <!--fourth child-->
     <div class="container my-3">
      <?php 
      if(isset($_GET['Insert_Category']))
      {
         include('insert categories.php');
      }
      if(isset($_GET['Insert_Brand']))
      {
         include('insert brands.php');
      }
      if(isset($_GET['view_products']))
      {
         include('view_products.php');
      }
      if(isset($_GET['edit_products']))
      {
         include('edit_products.php');
      }
      if(isset($_GET['delete_product']))
      {
         include('delete_product.php');
      }
      if(isset($_GET['view_categories']))
      {
         include('view_categories.php');
      }
      if(isset($_GET['view_brands']))
      {
         include('view_brands.php');
      }
      if(isset($_GET['edit_categories']))
      {
         include('edit_categories.php');
      }
      if(isset($_GET['edit_brands']))
      {
         include('edit_brands.php');
      }
      if(isset($_GET['delete_categories']))
      {
         include('delete_categories.php');
      }
      if(isset($_GET['delete_brands']))
      {
         include('delete_brands.php');
      }
      if(isset($_GET['list_orders']))
      {
         include('list_orders.php');
      }
      if(isset($_GET['list_payments']))
      {
         include('list_payments.php');
      }
      if(isset($_GET['list_users']))
      {
         include('list_users.php');
      }
      if(isset($_GET['']))
      {
         include('list_users.php');
      }
      ?>
     </div>
     <!---last child--->
     <?php 
include("../includes/footer.php"); 
?>

</div>

<!--  bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html> 


