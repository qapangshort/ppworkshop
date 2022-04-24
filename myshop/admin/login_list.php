<?php
//2. query ข้อมูลจากตาราง tb_member: 
$query = "SELECT l.*,m.m_name 
FROM tbl_login_log as l
INNER JOIN tbl_member as m ON l.ref_m_id=m.m_id
ORDER BY l.log_id DESC" or die("Error:" . mysqli_error());

// echo $query;
// exit; 

//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($conn, $query); 
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

echo "<table id='example' class='display table table-bordered table-hover' cellspacing='0'>";
//หัวข้อตาราง
echo "
<thead>
<tr align='center' class='info'>
<th width='5%'>No.</th>
<th width='75%'>Name user</th>
<th width='20%'>Date/Time</th>
</tr>
</thead>
";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td align='center'>" .$row["log_id"] .'.'. "</td> "; 
  echo "<td>" .$row["m_name"] .  "</td> "; 
  echo "<td>" .date('d/m/Y H:i:s', strtotime($row["log_date"])) .  "</td> "; 
}
echo "</table>";
//5. close connection
mysqli_close($conn);
?>