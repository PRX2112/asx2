<?php

$connect = new PDO("mysql:host=localhost;dbname=assign2x", "root", "");

if(isset($_POST["type"]))
{
 if($_POST["type"] == "category_data")
 {
  $query = "SELECT * FROM category ORDER BY cname ASC";
  $statement = $connect->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  foreach($data as $row)
  {
   $output[] = array(
    'id'  => $row["cname"],
    'name'  => $row["cname"]
   );
  }
  echo json_encode($output);
 }
 else
 {
  $query = "SELECT * FROM subcategory WHERE cname = '".$_POST["category_id"]."' ORDER BY scname ASC";
  $statement = $connect->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  foreach($data as $row)
  {
   $output[] = array(
    'id'  => $row["scid"],
    'name'  => $row["scname"]
   );
  }
  echo json_encode($output);
 }
}

?>
