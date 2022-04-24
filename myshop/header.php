<?php include('conn.php'); 
//insert counter
  $c_ipadr = $_SERVER['REMOTE_ADDR'];

  $sqlc = "INSERT INTO tbl_counter
      (c_ipadr)
       VALUES
       ('$c_ipadr')";
 
  $resultc = mysqli_query($conn, $sqlc) or die ("Error in query: $sqlc " . mysqli_error());



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>