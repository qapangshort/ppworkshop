<meta charset="utf-8">
<?php

include('../conn.php'); 
//เช็ค 
// echo '<pre>';
// print_r($_GET);
// echo '</pre>';
// exit();

	$ID = $_GET["ID"];

	//delete data
	$sql = "DELETE FROM tbl_prd WHERE p_id=$ID";
 
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	// echo '<pre>';
	// echo $sql;
	// echo '</pre>';
	// exit();
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('Succesfuly');";
	echo "window.location = 'prd.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error pls do again!!');";
	echo "window.location = 'prd.php'; ";
	echo "</script>";
}
?>