<meta charset="utf-8">
<?php

include('../conn.php'); 
//เช็ค 
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();

	
	$m_fname = mysqli_real_escape_string($conn,$_POST["m_fname"]);
	$m_name = mysqli_real_escape_string($conn,$_POST["m_name"]);
	$m_lname = mysqli_real_escape_string($conn,$_POST["m_lname"]);
	$m_email = mysqli_real_escape_string($conn,$_POST["m_email"]);
	$m_phone = mysqli_real_escape_string($conn,$_POST["m_phone"]);
	$m_address = mysqli_real_escape_string($conn,$_POST["m_address"]);

	$m_img2 = mysqli_real_escape_string($conn,$_POST["m_img2"]);
	$m_id = mysqli_real_escape_string($conn,$_POST["m_id"]);
	//เพิ่มรูป
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$m_img = (isset($_POST['m_img']) ? $_POST['m_img'] : '');
	$upload = $_FILES['m_img']['name'];
	if($upload != ''){
		//โฟลเดอร์ที่เก็บไฟล์
		$path = "../mimg/";
		$type = strrchr($_FILES['m_img']['name'], ".");
		//ตั้งชื่อไฟล์ใหม่
		$newname = $numrand.$date1.$type;
		$path_copy = $path.$newname;
		$path_link = "../mimg/".$newname;
		//คัดลอกไฟล์ไปยังโฟลเดอร์
		move_uploaded_file($_FILES['m_img']['tmp_name'], $path_copy);
	}else{
		$newname=$m_img2;
	}
	
	//edit member
	$sql = "UPDATE tbl_member SET
			m_fname='$m_fname',
			m_name='$m_name',
			m_lname='$m_lname',
			m_email='$m_email',
			m_phone='$m_phone',
			m_img='$newname',
			m_address='$m_address'
			WHERE m_id=$m_id
			 ";
 
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
	echo "alert('Succesfuly');";
	echo "window.location = 'index.php?&act=edit'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error pls do again!!');";
	echo "window.location = 'member_from_add.php'; ";
	echo "</script>";
}
?>