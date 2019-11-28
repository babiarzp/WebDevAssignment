<?php
// if(empty($_POST)){
//     die("Come on bro, you can't hack me!");
//   }
  //error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a8_babiarzp";

$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_error){
    die("Connection failed: " . $db->connect_error);
  }
 ?>
