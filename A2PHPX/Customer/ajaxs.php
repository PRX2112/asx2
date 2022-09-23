<?php 
include 'conn.php';
if(isset($_POST["squery"])){
   $output="";
   $query="SELECT * FROM prodx WHERE scname LIKE '%".$_POST["squery"]."%'";
   $result=mysqli_query($conn,$query);
   $output='<ul class="list-unstyle">';
   if(mysqli_num_rows($result) > 0)
   {
      while($row=mysqli_fetch_array($result)){
         $output='<li>'.$row["scname"].'</li>';
         // $output='<li>'.$row["scname"].'</li>';
      }
   }else{
      $output.='<li>Not FOund</li>';

   }
   $output.='</ul>';
   echo $output;
}
?>