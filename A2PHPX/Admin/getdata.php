<!DOCTYPE html>
<html>
    <?php include 'conn.php'; ?>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);
$r = intval($_GET['r']);

// mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM prodx WHERE pprice<=$q AND pprice>=$r";
$result = mysqli_query($conn,$sql);

echo "<table>
<tr>
<th>Prodname</th>
<th>ProdDesc</th>
<th>ProdPrice</th>
<th>Category</th>
<th>Subcategory</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['pname'] . "</td>";
  echo "<td>" . $row['pdesc'] . "</td>";
  echo "<td>" . $row['pprice'] . "</td>";
  echo "<td>" . $row['cname'] . "</td>";
  echo "<td>" . $row['scname'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>
</body>
</html>