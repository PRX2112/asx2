<?php
    include 'conn.php';
    include 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="card-body card my-5 ">
<form method="POST" enctype="multipart/form-data">
    <h1 align="center">
        Customer Registration
    </h1>
        <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Id :</label>
    <input type="text" class="form-control" name="cid" value="<?php if(isset($_GET['update_id'])){ echo $update;}?>" id="exampleInputEmail1" aria-describedby="emailHelp">
    

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name :</label>
    <input type="text" class="form-control" name="name" value="<?php if(isset($_GET['update_id'])){ echo $namex;}?>" id="exampleInputEmail1" aria-describedby="emailHelp">
    

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Password :</label>
    <input type="password" class="form-control" name="password" value="<?php if(isset($_GET['update_id'])){ echo $passx;}?>" id="exampleInputEmail1" aria-describedby="emailHelp">
    

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Age</label>
    <input type="number" class="form-control" name="age" value="<?php if(isset($_GET['update_id'])){ echo $agex;}?>" id="exampleInputEmail1" aria-describedby="emailHelp">
    

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Contact No :</label>
    <input type="number" class="form-control" value="<?php if(isset($_GET['update_id'])){ echo $conx;}?>" name="contact" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Photo</label>
    <input type="file" class="form-control" value="<?php if(isset($_GET['update_id'])){ echo $photox;}?>" name="filep" >
  </div>
  <div class="mb-3 form-check">
    <!-- <input type="checkbox" class="form-check-input"  id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
  </div>
  <button type="submit" class="btn btn-dark" name="submit">Register</button>
</form>
        </div>
    </div>
</div>
  

<?php 

if(isset($_POST['submit'])){
    $cid = $_POST["cid"];           
    $name =$_POST["name"]; 
    $pass = $_POST["password"];
    $age = $_POST["age"]; 
    $conx = $_POST["contact"]; 
    
    // $photo = $_POST["photo"];
    $basename=$_FILES['filep']['name'];
    $tmp_name=$_FILES['filep']['tmp_name'];
    $allowedf=array('.png','.jpeg','.gif');
    $size=$_FILES['filep']['size'];
    $namex=substr($basename,0,strripos($basename,'.'));
    $ext=substr($basename,strripos($basename,'.'));
    // echo $name,$ext;

    if(in_array($ext,$allowedf) )
    {
        $newname=md5($namex).rand(100,500).$ext;
        // echo $newname;
        $uploadok=0;
        if(file_exists('upload/.'.$newname))
        {
            echo "<script> alert('😢') </script>";
        }else{
            move_uploaded_file($tmp_name,'upload/'.$newname) or die();
            $uploadok=1;
        }
        
    }elseif(empty($namex)){
        echo "<script> alert('Not Found😢'); </script>";
    }
    // elseif($size>200000){
    //     echo "<script> alert('ITS TOO LARGER😢'); </script>";
    // }
    else{
        echo "<script> alert('Only this files allowed :.jpeg ,.png ,.gif ') </script>";
    }
if($uploadok == 1){
    echo "<script> alert('Profile Uploaded Successfully😍😍😍'); </script>";
}
$x=$newname;
//end upload
if(isset($_GET['update_id'])){

    mysqli_query($conn,"update cust_reg set name='$name',password='$pass',age='$age',contact='$conx', photo='$x' where sid='$id' ");
    header('location:index.php');

}else{
    $str="insert into cust_reg values ('$cid' ,'$name','$pass','$age','$conx','$newname')" or die('error');
    $res = mysqli_query($conn,$str);
    header('location:index.php');
}
}
?>