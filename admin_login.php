
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
     rel="stylesheet" 
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
     crossorigin="anonymous">
    

     <!--font awesome link-->
     <link rel="Stylesheet" herf="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
<style>
body{
    overflow:hidden;
}

</style>

</head>
<body>
    <div class="container-fliue m-3">
     <h2 class ="text-center mb-5">Admin Login

     </h2>
   <div class="row d-flex justify-containt-center ">
    <div class="col-lg-6 col-xl-5">
        <img src="../image/login.jpg" alt="Admin Registration" width="70%" height="70%" class="img-fluid">
    </div>
    <div class="col-lg-6 col-xl-4">
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" 
                placeholder="Enter your username" required="required"
                class="form-control">
            </div>
            
            <div class="form-outline mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" 
                placeholder="Enter your password" required="required"
                class="form-control">
            </div>
           
            <div>
                <input type="submit" class="bg-info py-2 px-3 border-0"
                 name="admin_login" value="login">
                 <p class="small fw-bold mt-2 pt-1">Do you have an account? <a href="admin_registration.php" 
                 class="link-danger">Register</a></p>
            </div>
        </form>
    </div>
    
   </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_login']))
{
  $user_username=$_POST['admin_name'];
  $user_password=$_POST['admin_password'];

  $select_query="Select * from admin_table where username='$admin_namename'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);


}
?>