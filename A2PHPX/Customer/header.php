<!DOCTYPE html>
<?php include 'conn.php'; 
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar  navbar-light bg-light justify-content-between">
  <a class="navbar-brand"><h3><i style="font-family: monospace;">Portal</i></h3></a>
  <form class="form-inline" method="POST">
    <?php 
   
    $type=$_SESSION['type'];
    if($type=='reg'){
      echo "<a class='btn btn-outline-success my-2 my-sm-0' href='index.php'>Login</a>";
    }elseif($type=='in'){
      echo 'hello...✌ ',$_SESSION['username'],'✌'; 
      echo "<a class='btn btn-outline-success my-2 my-sm-0' href='logout.php'>Logout</a>";
    }else{
      // echo "Nothing to show";
      echo "<i><h4>Have a Good Day...😇</h4></i>";
    }
?>
  </form>
</nav>
</body>
</html>