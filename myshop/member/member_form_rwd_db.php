<meta charset="utf-8">
<?php

include('../conn.php'); 
//เช็ค 
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();

	$m_id = $_POST["m_id"];
	$m_password1 = md5($_POST["m_password1"]);
	$m_password2 = md5($_POST["m_password2"]);


	//check password
	if($m_password1!= $m_password2){
	echo "<script type='text/javascript'>";
		echo "alert('password ไม่ตรงกัน');";
		echo "window.location = 'index.php?act=pwd'; ";
	echo "</script>";
	}else{

	//reset to db
	$sql = "UPDATE tbl_member SET
			m_password='$m_password1'
			WHERE m_id=$m_id
			 ";
 
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

	}
	// echo '<pre>';
	// echo $sql;
	// echo '</pre>';
	// exit();
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Succesfuly');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "alert('Error pls do again!!');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
}

?>