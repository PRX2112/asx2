<!DOCTYPE html>
<?php
 include 'conn.php';

$type='home';
$_SESSION['type']=$type;
include 'header.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!-- Script -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
      ul{
         background-color: #efe;
         cursor: pointer;
      }
      li{
         padding: 12px;
      }
   </style>
   <script>
      function disableME()
{
  var catbox= document.getElementById('category'),
      scatbox = document.getElementById('subcategory');

  if (catbox.value != 0) 
  {
   scatbox.disabled = true;
  }
  else
  {
    catbox.disabled = true;  }
   }
   if(catbox.value != 0 && scatbox.value != 0){
      alert('Please enter something to search');
   }
   </script>
</head>
<body>
   <section class="w-100 h-25">
    <h1 class="text-center text-italic ">WELCOME TO THE PORTAL</h1>

   </section>
   <section>

   <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    
      <form method="POST" class="d-flex mx-auto" role="search" >
      <div id='search-bar'>
      <!-- <label> search Category:</label> -->
        
      <input type="text" name="category" id="category" class="from-control" placeholder="Search Category" autocomplete="off" onchange="disableME()" required>
      <input type="text" name="subcategory" id="subcategory" class="from-control" placeholder="Search Sub-Category" autocomplete="off" onchange="disableME()" required>
        <button class="btn btn-outline-success" name="cates" type="submit">Search</button>
        <ul id="categorylist" class="text-light bg-success">
         <!-- values -->
      </ul>
      <ul id="scategorylist" class="text-light bg-success">
         <!-- values -->
      </ul>
      </div>
      </form>
    </div>
  </div>
</nav>

   </section>

   <div class="album my-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php
                if(isset($_POST['cates'])){
                 if(isset($_POST['category'])!=''){
                  $query = "select * from prodx where cname='".$_POST['category']."'";                
                  $sql = mysqli_query($conn, $query);
                 }elseif($_POST['subcategory']!=''){
                  $queryx = "select * from prodx where scname='".$_POST['subcategory']."'";                
                  $sql = mysqli_query($conn, $queryx);
                 }
               }else{
                  $queryx = "select * from prodx";                
                  $sql = mysqli_query($conn, $queryx);
                 }
                if(isset($sql)>0){
                while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                    $pid = $row['pid'];
                    $pic = $row['photo'];
                    $ProdName = $row['pname'];
                    $ProdDesc = $row['pdesc'];
                    $ProdPrice = $row['pprice'];
                    $ProdCategory = $row['cname'];
                    $ProdSubCategory = $row['scname'];
                    
                    echo "<div class='col'>";
                    echo "<div class='card shadow-sm'>";
                    echo "<img class='bd-placeholder-img card-img-top' width='100%' height='225' src='upload/$pic'/>";

                    echo "<div class='card-body'>";
                    echo "<p class='card-text text-start'><b>$ProdName</b><br><b>Price : $ProdPrice.₹</b><br><i>$ProdDesc</i><br><i>$ProdSubCategory</i></p>";
                    echo "<div class='d-flex justify-content-between align-items-center'>
                <div class='btn-group'>
                  <button type='button' class='btn btn-sm btn-outline-secondary'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>Buy</font></font></button>
                  <button type='button' class='btn btn-sm btn-outline-secondary'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;''>Add To Cart</font></font></button>
                </div>";

                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                } 
                ?>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</body>
<script>
   $(document).ready(function() {
      $('#category').keyup(function() {
            var query = $(this).val();
            // alert(query);
            if (query != '') {
               $.ajax({
                  url: "ajax.php",
                  method: "POST",
                  data: {
                     query: query
                  },
                  success: function(data) {
                     $('#categorylist').fadeIn();
                     $('#categorylist').html(data);
                  }
               });
            } else {
               $('#categorylist').fadeOut();
               $('#categorylist').html("");
            }
      });
      $(document).on('click','li',function(){
          $('#category').val($('#categorylist').text());
          $('#categorylist').fadeOut();

      });
   });
</script>
<script>
   $(document).ready(function() {
      $('#subcategory').keyup(function() {
            var squery = $('#subcategory').val();
            // alert(query);
            if (squery != '') {
               $.ajax({
                  url: "ajaxs.php",
                  method: "POST",
                  data: {
                     squery: squery
                  },
                  success: function(data) {
                     $('#scategorylist').fadeIn();
                     $('#scategorylist').html(data);
                  }
               });
            } else {
               $('#scategorylist').fadeOut();
               $('#scategorylist').html("");
            }
      });
      $(document).on('click','li',function(){
          $('#subcategory').val($('#scategorylist').text());
          $('#scategorylist').fadeOut();

      });
   });
</script>
</html>