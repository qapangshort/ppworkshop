<meta charset="utf-8">
<?php

include('../conn.php'); 
//เช็ค 
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();


	$ref_t_id = mysqli_real_escape_string($conn ,$_POST["ref_t_id"]);
	$p_name = mysqli_real_escape_string($conn ,$_POST["p_name"]);
	$p_detail = mysqli_real_escape_string($conn ,$_POST["p_detail"]);
	$p_price = mysqli_real_escape_string($conn ,$_POST["p_price"]);
	$p_qty = mysqli_real_escape_string($conn ,$_POST["p_qty"]);
	$p_id = mysqli_real_escape_string($conn ,$_POST["p_id"]);
	$p_img2 = mysqli_real_escape_string($conn ,$_POST["p_img2"]);

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
	$upload = $_FILES['p_img']['name'];
	if($upload != ''){
		//โฟลเดอร์ที่เก็บไฟล์
		$path = "../pimg/";
		$type = strrchr($_FILES['p_img']['name'], ".");
		//ตั้งชื่อไฟล์ใหม่
		$newname = $numrand.$date1.$type;
		$path_copy = $path.$newname;
		$path_link = "../pimg/".$newname;
		//คัดลอกไฟล์ไปยังโฟลเดอร์
		move_uploaded_file($_FILES['p_img']['tmp_name'], $path_copy);
	}else{
		$newname=$p_img2;
	}

	
	//edit prd
	$sql = "UPDATE tbl_prd SET
			ref_t_id='$ref_t_id',
			p_name='$p_name',
			p_detail='$p_detail',
			p_price='$p_price',
			p_qty='$p_qty',
			p_img='$newname'

			WHERE p_id=$p_id;					
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
	echo "window.location = 'prd.php?ID=$p_id&act=edit'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error pls do again!!');";
	echo "window.location = 'prd_from_add.php'; ";
	echo "</script>";
}
?>