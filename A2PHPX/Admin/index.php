<!DOCTYPE html>
<?php include 'conn.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        html,body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  max-width: 350px;
  padding: 15px;
  border:2px solid blue;
  border-radius: 15px 15px;
}

.form-signin .form-floating:focus-within {
  z-index: 1;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;

}
</style>
</head>
<body class="text-center">
    
<div class="form-signin w-100 m-auto">
  <form method="POST">
    <h1 class="h3 mb-3 fw-normal">Sign in</h1>

    <div class="form-floating">
      <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
    <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Sign in</button>
  </form>
  <?php 
        if(isset($_POST['login'])){
            $name=$_POST['name'];
            $pass=$_POST['password'];
            $str="select * from admin where name='$name' and '$pass'";
            // echo "select * from admin where name='$name' and password='$pass'";
            $query=mysqli_query($conn,$str);
            $row=mysqli_num_rows($query);
            if($row == 1){
                echo "<script>window.location.href='category.php';alert('Login Successfully...☣☣☣')</script>";

            }else{
                echo "<script>alert('Login Failed...⚠⚠⚠')</script>";

            }
        }
  ?>
</div>
</body>
</html>