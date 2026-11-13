<?php
include("../includes/connect.php");
include('../functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width,initial-scale=1.0">
       <title>User-registation</title>

       <!--boortstrap CSS link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
     rel="stylesheet" 
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
     crossorigin="anonymous">
</head>    
<body>
  <div class="container-fluid my-3">
    <h2 class="text-center ">New User Registation</h2>
    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-lg-12 col-xl-6">
        <form action="" method="post" enctype="multipart/form-data">
           
            <!--username feild-->
            <div class="form-outline mb-4">
            <lable for="user_username" class="form-lable">Username</lable>
            <input type="text" id="user_usename" class="form-control" 
            placeholder="Enter Your Username"
            autocomplete="off" required="required" name="user_username"/> 
            </div>
            <!--email field-->
            <div class="form-outline mb-4">
            <lable for="user_email" class="form-lable">Email</lable>
            <input type="email" id="user_email" class="form-control" 
            placeholder="Enter Your Email" autocomplete="off" required="required" name="user_email"/> 
            </div>
            <!--image field-->
            <div class="form-outline mb-4">
            <lable for="user_image" class="form-lable">User Image</lable>
            <input type="file" id="user_image=" class="form-control" 
            required="required" name="user_image"/> 
            </div>
            <!--password field-->
            <div class="form-outline mb-4">
            <lable for="user_password" class="form-lable">Password</lable>
            <input type="password" id="user_password=" class="form-control" 
            placeholder="Enter Your Password"
            autocomplete="off" required="required" name="user_password"/> 
            </div>
            <!--confirm password field-->
            <div class="form-outline mb-4">
            <lable for="conf_user_password" class="form-lable">Confirm Password</lable>
            <input type="password" id="conf_user_password=" class="form-control" 
            placeholder="Confirm Password"
             autocomplete="off" required="required" name="conf_user_password"/> 
            </div> 
            <!--Address feild-->
            <div class="form-outline mb-4">
            <lable for="user_address" class="form-lable">Address</lable>
            <input type="text" id="user_address=" class="form-control" 
            placeholder="Enter Your Address"
            autocomplete="off" required="required" name="user_address"/> 
            </div>
            <!--Contact feild-->
            <div class="form-outline mb-4">
            <lable for="user_mobile" class="form-lable">Contact</lable>
            <input type="text" id="user_mobile=" class="form-control" 
            placeholder="Enter Your Mobile Number"
            autocomplete="off" required="required" name="user_mobile"/> 
            </div>
      <div class="mt-4 pt-2">
        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0"
        name="user_register">
        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? 
          <a href="user_login.php" class="text-danger"> Login</a></p>
      </div>
        </form>
    </div>
  </div>
</body>
</html>

<?php
if(isset($_POST['user_register'])){
  $user_username=$_POST['user_username'];
  $user_email=$_POST['user_email'];
  $user_password=$_POST['user_password'];
  $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
  $conf_user_password=$_POST['conf_user_password'];
  $user_address=$_POST['user_address'];
  $user_mobile=$_POST['user_mobile'];
  $user_image=$_FILES['user_image']['name'];
  $user_image_tmp=$_FILES['user_image']['tmp_name'];
  $user_ip=getIPAddress();

//select query
 $select_query="Select * from user_table where username='$user_username' or user_email='$user_email'";
 $result=mysqli_query($con,$select_query);
 $rows_count=mysqli_num_rows($result);
 if($rows_count>0)
 {
   echo"<script>alert('Username or Email already exits')</script>";
 }
 else if($user_password!=$conf_user_password)
 {
 echo"<script>alert('Passwords do not match')</script>";
 }
else
{
  //insert_query
move_uploaded_file($user_image_tmp,"./user_images/$user_image");
$insert_query="insert into user_table (username,user_email,user_password,user_image,user_ip,
user_address,user_mobile) values ('$user_username','$user_email','$hash_password',
'$user_image','$user_ip','$user_address','$user_mobile')";
$sql_execute=mysqli_query($con,$insert_query);
if($sql_execute)
{
  echo "<script>alert('data inserted successfully')</script>";
}
else
{
  die($mysqli_error($con));

}
}
// selecting cart items
$select_cart_items="select * from cart_details where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
  $_SESSION['username']=$user_username;
  echo"<script>alert('you have items in your cart')</script>"; 
  echo"<script>window.open('checkout.php','_self')</script>"; 
  
}else{
  echo"<script>window.open('../homenavbar.php','_self')</script>"; 
}

}
?>