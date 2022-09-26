<!DOCTYPE html>
<?php 
include 'conn.php';
include 'header.php';
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form method="POST" class="form-control" role="search" >
<div>      
  <h1 class="text-center">Date-Range-Wise-Report</h1>
<div class='container-fluid'><div class='row w-25 m-auto'><div class='card-body card my-3'>
      <input type="date" name="date" id="date" class="from-control" placeholder="Search Category" autocomplete="off" >
      <br><div class="d-flex">
      <select type="text" name="from" id="subcategory" class="text-center from-control w-50" placeholder="Range" autocomplete="off">
        <option value=''>---From---</option>
        <option value='0'>Less then 100₹</option>
        <option value='100'>100₹</option>
        <option value='500'>500₹</option>
        <option value='1000'>1000₹</option>
        <option value='3000'>3000₹</option>
      </select>
      <select type="text" name="to" id="subcategory" class="from-control w-50" placeholder="Range" autocomplete="off" >
      <option value="">---TO---</option>
      <option value="500">500₹</option>
      <option value="1000">1000₹</option>
      <option value="3000">3000₹</option>
      <option value="5000">5000₹</option>
      <option value="100000">More then 5000₹</option>

      </select></div>
      <br>  
      <button class="btn btn-outline-success" name="search" type="submit">Search</button>
        </div></div></div>
</div>
      <?php 
      
      if(isset($_POST['search'])){
        if($_POST['date']){
          $str="select * from prodx where date LIKE '%".$_POST["date"]."%'";
          $sql = mysqli_query($conn, $str);
        }else{
          $from=$_POST['from'];
          $to=$_POST['to'];
          $str="select * from prodx where pprice >= $from and pprice < $to";
          $sql = mysqli_query($conn, $str);
        }
       


        echo "<div class='container'><div class='row w-100 m-auto'><div class='card-body card my-5'>";
        echo "<div class='mx-auto container-fluid'><table class='table table-light text-center'>";
        echo"<tr><th>Photo</th><th>Product Name</th><th>Description</th><th>Price</th><th>Category</th><th>Sub-Category</th><th>Date</th></tr>";
        while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
            $pid = $row['pid'];
            $pic = $row['photo'];
            $ProdName = $row['pname'];
            $ProdDesc = $row['pdesc'];
            $ProdPrice = $row['pprice'];
            $ProdCategory = $row['cname'];
            $ProdSubCategory = $row['scname'];
            $dtx = $row['date'];
            echo"<tr><td>$pic</td><td>$ProdName</td><td>$ProdDesc</td><td>$ProdPrice</td><td>$ProdCategory</td><td>$ProdSubCategory</td><td>$dtx</td></tr>";
         
     } echo "</table></div>";
      echo "</div></div></div>";
     } ?>
      </div>
      </form>
</body>
</html>