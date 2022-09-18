<!DOCTYPE html>
<?php include 'conn.php';
include 'header.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Master</title>
    <style>
        body::-webkit-scrollbar{
            display: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row w-50 m-auto">
        <div class="card-body  card my-5  ">
<form method="POST">
<h1 align="center">
        Category Master
    </h1>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category :</label>
    <input type="text" class="form-control" name="name" value="<?php ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div class="text-center">
        <input type="submit" class="btn btn-dark text-center my-3" value="Add" name="submit">
    </div>
  <?php 
  if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $ins="insert into category value(null,'$name')";
  $query=mysqli_query($conn,$ins);
  }
  echo "<table class='table table-light text-center'>";
  echo "<tr><th>Category Id</th><th>Category Name</th></tr>";
  $s="select * from category";
  $q=mysqli_query($conn,$s);
  while($row=mysqli_fetch_array($q,MYSQLI_ASSOC)){
  echo "<tr><th>$row[id]</th><th>$row[cname]</th></tr>";

  }
  ?>
</form>
        </div>
    </div>
</div>


</body>
</html>