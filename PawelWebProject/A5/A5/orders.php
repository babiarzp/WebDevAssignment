
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/A5.css">
  </head>
  <body>
    <input type="number" id="idNumber" placeholder="ID #">
    <a href="index.html" onaction="delete()">Delete</a>
    <a href="index.html">Home</a>
  </body>
</html>
<?php

include('db_connection.php');

$sql = "SELECT * FROM order_data";


$result = mysqli_query($db, $sql);


echo"<table border='1'>";
echo"<tr><td>ID</td><td>Name</td><td>Email</td><td>Phone</td>
  <td>Address</td>
  <td>City</td><td>PostalCode</td><td>Province</td><td>DurAA</td>
  <td>DurAAA</td><td>EnerAA</td><td>shippingCost</td><td>Tax</td>
  <td>Total</td><td>LastEdited</td></tr>";
while($row = mysqli_fetch_assoc($result)){
  echo"<tr>
    <td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['email']}</td>
    <td>{$row['phone']}</td><td>{$row['address']}</td>
    <td>{$row['city']}</td><td>{$row['post_code']}</td>
    <td>{$row['province']}</td><td>{$row['dur_aa']}</td>
    <td>{$row['dur_aaa']}</td><td>{$row['ener_aa']}</td>
    <td>{$row['shippingCost']}</td><td>{$row['tax']}</td>
    <td>{$row['total']}</td><td>{$row['last_edited']}</td></tr>";

}
echo"</table>";


function delete(){
  $idNumber = $_POST['idNumber'];

  //DELETE FROM `order_data` WHERE `order_data`.`ID` = $idNumber;
  echo "Record successfully Deleted";
}

?>
