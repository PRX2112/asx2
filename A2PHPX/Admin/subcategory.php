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
    <label for="exampleInputEmail1" class="form-label">Sub-Category :</label>
    <input type="text" class=" form-control" name="subname" value="<?php if(isset($_GET['update_id'])){ }?>" id="exampleInputEmail1" aria-describedby="emailHelp">
   
    <div class="mb-3 my-3">
    <label for="exampleInputEmail1" class="form-label">Category :</label>
    <?php 
    $s="select * from category";
    $q=mysqli_query($conn,$s);
    echo "<select name='name' class='form-select w-100 py-2 text-center'>";
    echo "<option value=''>~~Select Category~~</option>";
    while($row=mysqli_fetch_array($q,MYSQLI_ASSOC)){
    
    echo "<option value='$row[cname]'>$row[cname]</option>";
    }
    echo "</select>";
    ?>
    
<!--     
    <input type="text" class="form-control" name="name" value="<?php if(isset($_GET['update_id'])){ }?>" id="exampleInputEmail1" aria-describedby="emailHelp">
    -->
    <div class="text-center">
        <input type="submit" class="btn btn-dark text-center my-3" value="Add" name="submit">
    </div>
  <?php 
  if(isset($_POST['submit']) && $_POST['name']!=""){
  $name=$_POST['name'];
  $sname=$_POST['subname'];
  $ins="insert into subcategory value(null,'$name','$sname')";
  $query=mysqli_query($conn,$ins);
  }
  echo "<table class='table table-light text-center'>";
  echo "<tr><th>Sub-Category Id</th><th>Category</th><th>Sub-Category</th></tr>";
  $s="select * from subcategory order by scid";
  $q=mysqli_query($conn,$s);
  while($row=mysqli_fetch_array($q,MYSQLI_ASSOC)){
  echo "<tr><td>$row[scid]</td><td>$row[cname]</td><td>$row[scname]</td></tr>";

  }
  ?>
</form>
        </div>
    </div>
</div>


</body>
</html>