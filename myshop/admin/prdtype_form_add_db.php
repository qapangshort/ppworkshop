<meta charset="utf-8">
<?php

include('../conn.php'); 
//เช็ค 
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();

	$t_name =  mysqli_real_escape_string($conn , $_POST["t_name"]);
	
	//เช็คซ้ำ
	$check = "
	SELECT t_name 
	FROM tbl_prd_type
	WHERE t_name='$t_name'
	";
	$result1 = mysqli_query($conn,$check) or die (mysqli_error());
	$num = mysqli_num_rows($result1);
	if($num > 0)
	{
		echo "<script>";
		echo "alert('ข้อมูลซ้ำ');";
		echo "window.history.back();";
		echo "</script>";
	}else{
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO tbl_prd_type
			(t_name)
			 VALUES
			 ('$t_name')";
 
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	}
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Succesfuly');";
	echo "window.location = 'prdtype.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error pls do again!!');";
	echo "window.location = 'prdtype_from_add.php'; ";
	echo "</script>";
}
?>