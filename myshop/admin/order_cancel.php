<meta charset="utf-8">
<?php 
include('../conn.php'); 

 // echo'<pre>';
 //  print_r($_POST);
 //  echo '</pre>';

$o_id =$_POST["o_id"];



	//แก้ไขข้อม
	$sql = "UPDATE order_head  SET o_status=4 WHERE o_id=$o_id";

	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

 
	// echo $sql;
	// exit;
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Cancel Success!!');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
}
?>