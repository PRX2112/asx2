<?php 
include 'conn.php';
if(isset($_POST["query"])){
   $output="";
   $query="SELECT * FROM prodx WHERE cname LIKE '%".$_POST["query"]."%'";
   $result=mysqli_query($conn,$query);
   $output='<ul class="list-unstyle">';
   if(mysqli_num_rows($result) > 0)
   {
      while($row=mysqli_fetch_array($result)){
         $output='<li>'.$row["cname"].'</li>';
         // $output='<li>'.$row["scname"].'</li>';
      }
   }else{
      $output.='<li>Not FOund</li>';

   }
   $output.='</ul>';
   echo $output;
}
?>