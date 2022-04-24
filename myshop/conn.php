<?php
$conn= mysqli_connect("localhost","root","","my_db") or die("Error: " . mysqli_error($conn));
// error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');
// Turn off all error reporting
error_reporting(0);

// if($conn){
// 	echo 'ok';
// }else{
// 	echo 'fail';
// }


?>