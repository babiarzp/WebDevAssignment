<?php
    include('db_connection.php');

    // if(empty($_POST)){
    //     die("Come on bro, you can't hack me!");
    //   }


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$province = $_POST['province'];
$postalcode = $_POST['postalcode'];
$shipping = $_POST['shipping'];
$durAA = $_POST['durAA'];
$durAAA = $_POST['durAAA'];
$enerAA = $_POST['enerAA'];
$password = $_POST['password'];

$durAACost = 0;
$durAAACost = 0;
$enerAACost = 0;
$tax = 0;
$totalCost = 0;
$subTotal = 0;
$shippingCost = 0;
$taxPerc = 0;
$taxDol = 0;
$provinceName = '';


// global $durAACost;
// global $durAAACost;
// global $enerAACost;
// global $tax;
// global $totalCost;
// global $subTotal;
// global $shippingCost;
// global $taxPerc;
// global $taxDol;

//if (error){exit;}
function errorCheck(){
  global $name;
  global $email;
  global $address;
  global $phone;
  global $city;
  global $durAA;
  global $durAAA;
  global $enerAA;
  global $province;
  global $postalcode;
  global $password;
  if($name == ''){exit;}
  if($email == ''){exit;}
  if($address == ''){exit;}
  if($phone == ''){exit;}
  if($city == ''){exit;}
  if($password == ''){exit;}
  if($durAA!=0){
    if($durAAA!=0){
      if($enerAA!=0){
        exit;}
      }
    }

  if($province == ''){
    exit;
  }
  if($postalcode == ''){
    exit;
  }
  if(!$durAA || $durAA<0){
    $durAA = 0;
  }
  if(!$durAAA || $durAAA<0){
    $durAAA = 0;
  }
  if(!$enerAA || $enerAA<0){
    $enerAA = 0;
  }
}

errorCheck();
function provUpdate(){
  global $province;
  global $provinceName;
  if($province == 1){
    $provinceName = 'Alberta';
  }
  else if($province == 2){
    $provinceName = 'British Columbia';
  }
  else if($province == 3){
    $provinceName = 'Manitoba';
  }
  else if($province == 4){
    $provinceName = 'New Brunswick';
  }
  else if($province == 5){
    $provinceName = 'Newfoundland';
  }
  else if($province == 6){
    $provinceName = 'Northwest Territories';
  }
  else if($province == 7){
    $provinceName = 'Nova Scotia';
  }
  else if($province == 8){
    $provinceName = 'Nunavut';
  }
  else if($province == 9){
    $provinceName = 'Ontario';
  }
  else if($province == 10){
    $provinceName = 'Prince Edward Island';
  }
  else if($province == 11){
    $provinceName = 'Quebec';
  }
  else if($province == 12){
    $provinceName = 'Saskatchewan';
  }
  else if($province == 13){
    $provinceName = 'Yukon';
  }
}
provUpdate();

function getTax(){
  global $province;
  global $tax;
  if($province == 1){
   $tax += 1.05;
  }
  else if($province == 2){
   $tax += 1.12;
  }
  else if($province == 3){
   $tax += 1.13;
  }
  else if($province == 4){
   $tax += 1.15;
  }
  else if($province == 5){
   $tax += 1.15;
  }
  else if($province == 6){
   $tax += 1.05;
  }
  else if($province == 7){
   $tax += 1.15;
  }
  else if($province == 8){
   $tax += 1.05;
  }
  else if($province == 9){
   $tax += 1.13;
  }
  else if($province == 10){
   $tax += 1.15;
  }
  else if($province == 11){
   $tax += 1.14975;
  }
  else if($province == 12){
   $tax += 1.11;
  }
  else if($province == 13){
   $tax += 1.05;
  }
}
getTax();

function getShipping(){
  global $shipping;
  global $shippingCost;
  if($shipping == 1){
   $shippingCost += 30;
  }
  else if($shipping == 2){
   $shippingCost += 25;
  }
  else if($shipping == 3){
   $shippingCost += 20;
  }
  else if($shipping == 4){
   $shippingCost += 15;
  }

}
getShipping();

$durAACost += ($durAA * 20);
$durAAACost += ($durAAA * 15);
$enerAACost += ($enerAA * 25);
$subTotal += ($shippingCost + $durAACost + $durAAACost + $enerAACost);
$totalCost += (($subTotal)*$tax);


$taxPerc = (($tax-1)*100);
$taxDol = ($subTotal*($tax-1));

$sql = "INSERT INTO
                order_data
                (ID, name, email, phone, address, city, post_code, province,
                  dur_aa, dur_aaa, ener_aa, shippingCost, tax, total,
                  last_edited)
                VALUES
                (NULL, '$name', '$email', '$phone', '$address', '$city',
                  '$postalcode', '$provinceName', '$durAA', '$durAAA', '$enerAA',
                  '$shippingCost', '$tax', '$totalCost', CURRENT_TIMESTAMP);";

$result = $db->query($sql);

$sqlLogin = "INSERT INTO
                      user_login
                      (user_id, name, username, password, role, last_edited)
                    VALUES
                    (NULL, '$name', '$email', '$password', 2,
                      CURRENT_TIMESTAMP);";
$resultLogin = $db->query($sqlLogin);

if ($result || $resultLogin) {
    echo "New record created successfully<br/>";
    echo "Account created";
}
else {
    echo "Sorry, an error occured <br/>";
    echo $db->error;
}


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Batteries R Us</title>
    <link rel="stylesheet" type="text/css" href="css/A5.css">
    <script type="text/javascript" src="js/A5.js"></script>
    <h1>Batteries R Us</h1>
  </head>
  <body>
    <table>
      <tr>
        <td>Name</td><td>:</td><td><?php echo $name?></td>
      </tr>
      <tr>
        <td>Email</td><td>:</td><td><?php echo $email?></td>
      </tr>
      <tr>
        <td>Phone Number</td><td>:</td><td><?php echo $phone?></td>
      </tr>
      <tr>
        <td>Delivery Address</td><td>:</td><td><?php echo $address?><br/><?php echo $city?><br/><?php echo $provinceName?>, <?php echo $postalcode?></td>
      </tr>
      <tr>
        <td><?php echo $durAA?>x Duracel AA (20 pack) $20</td><td>:</td><td><?php echo $durAACost?></td>
      </tr>
      <tr>
        <td><?php echo $durAAA?>x Duracel AAA (20 pack) $15</td><td>:</td><td><?php echo $durAAACost?></td>
      </tr>
      <tr>
        <td><?php echo $enerAA?>x Energizer AA (20 pack) $25</td><td>:</td><td><?php echo $enerAACost?></td>
      </tr>
      <tr>
        <td>Shipping Cost</td><td>:</td><td><?php echo $shippingCost?></td>
      </tr>
      <tr>
        <td>Sub Total</td><td>:</td><td><?php echo $subTotal?></td>
      </tr>
      <tr>
        <td>Taxes @ <?php echo $taxPerc?></td><td>:</td><td><?php echo $taxDol?></td>
      </tr>
      <tr>
        <td>Total</td><td>:</td><td><?php echo $totalCost?></td>
      </tr>
    </table>

    <a href="index.html">Back</a>

  </body>
</html>
