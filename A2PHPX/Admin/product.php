<!DOCTYPE html>
<?php include 'conn.php';
include 'header.php';
session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Master</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        // photo upload
        $basename = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $allowedf = array('.png', '.jpg', '.gif');
        // $size=$_FILES['filephoto']['size'];
        $name = substr($basename, 0, strripos($basename, '.'));
        $ext = substr($basename, strripos($basename, '.'));
        if (in_array($ext, $allowedf)) {
            $newname = md5($name) . rand(100, 500) . $ext;
            // echo $newname;
            $uploadok = 0;
            if (file_exists('upload/.' . $newname)) {
                echo "<script> alert('😢') </script>";
            } else {
                move_uploaded_file($tmp_name, 'upload/' . $newname);
                $uploadok = 1;
            }
        } elseif (empty($name)) {
            echo "<script> alert('Not Found😢'); </script>";
        } else {
            echo "<script> alert('Only this files allowed :.pdf ,.docx ,.txt ') </script>";
        }
        if ($uploadok == 1) {
            echo "<script> alert('Photo Uploaded Successfully😍😍😍'); </script>";
        }
        $ProdName = $_POST['ProdName'];
        $ProdDesc = $_POST['ProdDesc'];
        $ProdPrice = $_POST['ProdPrice'];
        $ProdCategory = $_POST['category_item'];
        $ProdSubCategory = $_POST['sub_category_item'];
        // echo $prodName." ".$ProdPrice." ".$ProdCategory." ".$ProdSubCategory;
        $query="insert into prodx values (null,'$newname','$ProdName','$ProdDesc','$ProdPrice','$ProdCategory','$ProdSubCategory')";
        $res = mysqli_query($conn, $query);
        // echo "insert into prodx values ('$newname','$ProdName','$ProdPrice','$ProdCategory','$ProdSubCategory')";
    }
    ?>
    <div class="container">
        <div class="row w-50 m-auto">
            <div class="card-body  card my-5  ">
                <form method="POST" enctype="multipart/form-data">
                    <h1 align="center">
                        Product Master
                    </h1>
                    
                    <div class="mb-3 my-3">
                        <!-- <label for="exampleInputEmail1" class="form-label">Product Name :</label> -->
                        <input type="file" class=" form-control" name="file" value="" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3 my-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name :</label>
                        <input type="text" class=" form-control" name="ProdName" value="" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3 my-3">
                        <label for="exampleInputEmail1" class="form-label">Product Description :</label>
                        <textarea class=" form-control" name="ProdDesc" id="exampleInputEmail1" aria-describedby="emailHelp" required></textarea>
                    </div>

                    <div class="mb-3 my-3">
                        <label for="exampleInputEmail1" class="form-label">Product Price :</label>
                        <input type="number" class=" form-control" name="ProdPrice" value="" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>

                    <div class="form-group">
            <label>Select Category</label>
            <select name="category_item" id="category_item" class="form-control input-lg" data-live-search="true" title="Select Category" required>

            </select>
          </div>
          <div class="form-group">
            <label>Select Sub Category</label>
            <select name="sub_category_item" id="sub_category_item" class="form-control input-lg" data-live-search="true" title="Select Sub Category" required>

            </select>
          </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-dark text-center my-3" value="Add" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="album ">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php
                $queryx = "select * from prodx";
                $sql = mysqli_query($conn, $queryx);
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
                  <button type='button' class='btn btn-sm btn-outline-secondary'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>Show</font></font></button>
                  <button type='button' class='btn btn-sm btn-outline-secondary'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;''>Modify</font></font></button>
                </div>";

                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
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
$(document).ready(function(){

  $('#category_item').selectpicker();

  $('#sub_category_item').selectpicker();

  load_data('category_data');

  function load_data(type, category_id = '')
  {
    $.ajax({
      url:"load_data.php",
      method:"POST",
      data:{type:type, category_id:category_id},
      dataType:"json",
      success:function(data)
      {
        var html = '';
        for(var count = 0; count < data.length; count++)
        {
          html += '<option value="'+data[count].name+'">'+data[count].name+'</option>';
        }
        if(type == 'category_data')
        {
          $('#category_item').html(html);
          $('#category_item').selectpicker('refresh');
        }
        else
        {
          $('#sub_category_item').html(html);
          $('#sub_category_item').selectpicker('refresh');
        }
      }
    })
  }

  $(document).on('change', '#category_item', function(){
    var category_id = $('#category_item').val();
    load_data('sub_category_data', category_id);
  });
  
});
</script>


</html>