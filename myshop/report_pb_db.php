<?php
include('conn.php');
// echo '<pre>';
	// print_r($_POST);
// echo '</pre>';
// exit();
	$p_detail = $_POST["p_detail"];
	$p_email = $_POST["p_email"];
	$p_phone = $_POST["p_phone"];
		
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO tbl_problem
			(p_detail,
				p_email,
				p_phone
				)
			VALUES
			('$p_detail',
				'$p_email',
				'$p_phone'
			)";

	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database


//lSMlyl4lL5KX2lwwyaHGNj6GuzT1CbSDj0EUGvOT6vS


//token
	//BIUM5bLYsoBU4a1hMQz1hiJ91tRpfw403iAJIo07Mg7
//Line notifly
define('LINE_API',"https://notify-api.line.me/api/notify");
 
$token = "BIUM5bLYsoBU4a1hMQz1hiJ91tRpfw403iAJIo07Mg7"; //ใส่Token ที่copy เอาไว้
$str = 'รายละเอียดปัญหา  ' .$p_detail .
', เบอร์โทร  ' .$p_phone .
', อีเมลล์  ' .$p_email; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
 
$res = notify_message($str,$token);
// print_r($res);
function notify_message($message,$token){
 $queryData = array('message' => $message);
 $queryData = http_build_query($queryData,'','&');
 $headerOptions = array( 
         'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents(LINE_API,FALSE,$context);
 $res = json_decode($result);
 return $res;
}

// $mdate = date('Y-m-d H:i:s');
// mail(
// 	$p_email,"ขอบคุณสำหรับการแก้ปัญหาการใช้งานเว็ปไซต์ :"
// 	,$p_detail.'ว/ด/ป'
// 	.$mdate
// );


mysqli_close($conn);
	
	if($result){
echo "<script type='text/javascript'>";
echo "alert('แจ้งปัญหาเรียบร้อย');";
echo "window.location = 'index.php'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('Error pls do again!!');";
echo "window.location = 'index.php'; ";
echo "</script>";
}
?>