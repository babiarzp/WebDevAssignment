<?php
    //
    // include('db_connection.php');


    $errors = '';
    //
    // $email = $_POST['email'];
    // $password = $_POST['password'];
    function findErrors(){
      alert("sup");
    }
    // $sql = "
    //             SELECT * FROM `user_login`
    //             WHERE `username` = '$email'
    //             AND `password` = '$password'
    //            ";
    // $result = $db->query($sql);

    // if($result->num_rows == 1){
    //     $row = $result->fetch_assoc();
    //     $_SESSION['user_id'] = $row['user_id'];
    //     $_SESSION['role'] = $row['role'];
    //
    //     header('location: orders.php');
    // }
    // else{
    //       $error = 'Username or password not correct';
    // }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" type="text/css" href="css/A5.css">
   </head>
   <body>
     <form method="post">
       <table>
         <label>Email: </label>
         <input id="email" type="text" name="email"></br>

         <label>Password: </label>
         <input id="password" type="text" name="password"><br/>

       </table>

       <br/><br/>
       <a href="orders.php" onclick="">Go</a>

       <p id="errors"><?php echo $errors; ?></p>

     </form>
     <a href="index.html">Home</a>
   </body>
</html>
