<?php 
session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
include('../conn.php');

//สร้างตัวแปรจาก session 
$m_id = $_SESSION['m_id'];
$m_name = $_SESSION['m_name'];
$m_level = $_SESSION['m_level'];

if($m_level!='MEMBER'){
	Header("Location: ../logout.php");
}

//query member login 
$sql = "SELECT * FROM tbl_member WHERE m_id=$m_id";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
$m_img = $row['m_img'];
$m_name = $row['m_name'];


//query last login 
$sql2 = "SELECT * FROM tbl_login_log 
WHERE ref_m_id=$m_id
ORDER BY log_id DESC 
LIMIT 1 
";
$result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql " . mysqli_error());
$row1 = mysqli_fetch_array($result2);
extract($row1);

$lastlogin =  $row1['log_date'];

// echo '<pre>';
// print_r($row);
// echo '</pre>';
// exit();

    if($m_level!='MEMBER'){
    	Header("Location: ../login.php");
    }
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>my backend</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		<!--datatable-->
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
		<script src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
		</script>
		<script>
			$(document).ready( function () {
   			$('#example').DataTable( {
   				"aaSorting" :[[0,'asc']],
   			});
			} );
		</script>
		<!-- 	<script type="text/javascript" charset="utf-8">
			$(document).ready( function () {
   			$('#example').DataTable( {
   				"aaSorting" :[[0,'asc']],
   				"oLanguage": {
   				"sLangthMenu":"แสดง _MENU_ เร็คคอร์ด ต่อหน้า", //ไม่แสดง
   				"sZeroRecords":"ไม่เจอข้อมูลที่ค้นหา",
   				"sInfo":"แสด ง_START_ถึง_END_ของ_TOTAL_ เร็คคอร์ด",
   				"sInfoEmpty":"แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
   				"sInfoFiltered":"(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
   				"sSearch":"ค้นหา :",
   				"aaSorting" :[[0,'desc']],
   				"oPaginate":{
   					"sFirst": "หน้าแรก",
   					"sPrevious": "ก่อนหน้า",
   					"sNext": "ถัดไป",
   					"sLast": "หน้าสุดท้าย"
   					},
   				}
   			});
			} );
		</script> -->
	</head>