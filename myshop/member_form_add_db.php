<meta charset="utf-8">
<?php

include('conn.php'); 
//เช็ค 
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();

	$m_username = $_POST["m_username"];
	$m_password = md5($_POST["m_password"]);
	$m_fname = $_POST["m_fname"];
	$m_name = $_POST["m_name"];
	$m_lname = $_POST["m_lname"];
	$m_email = $_POST["m_email"];
	$m_phone = $_POST["m_phone"];
	$m_level = $_POST["m_level"];
	//เพิ่มรูป
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$m_img = (isset($_POST['m_img']) ? $_POST['m_img'] : '');
	$upload = $_FILES['m_img']['name'];
	if($upload != ''){
		//โฟลเดอร์ที่เก็บไฟล์
		$path = "mimg/";
		$type = strrchr($_FILES['m_img']['name'], ".");
		//ตั้งชื่อไฟล์ใหม่
		$newname = $numrand.$date1.$type;
		$path_copy = $path.$newname;
		$path_link = "mimg/".$newname;
		//คัดลอกไฟล์ไปยังโฟลเดอร์
		move_uploaded_file($_FILES['m_img']['tmp_name'], $path_copy);
	}
	//เช็คซ้ำ
	$check = "
	SELECT m_username ,m_email
	FROM tbl_member
	WHERE m_username='$m_username'
	OR m_email='$m_email'
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
	$sql = "INSERT INTO tbl_member
			(m_username,
			m_password,
			m_fname,
			m_name,
			m_lname,
			m_email,
			m_phone,
			m_img,
			m_level
			)
			 VALUES
			('$m_username',
			'$m_password',
			'$m_fname',
			'$m_name',
			'$m_lname',
			'$m_email',
			'$m_phone',
			'$newname',
			'$m_level'
			 )";
 
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	// echo '<pre>';
	// echo $sql;
	// echo '</pre>';
	// exit();
	//ปิดการเชื่อมต่อ database
}//ปิดเช็คซ้ำ
	mysqli_close($conn);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Succesfuly');";
	echo "window.location = 'login.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error pls do again!!');";
	echo "window.location = 'register.php'; ";
	echo "</script>";
}
?>