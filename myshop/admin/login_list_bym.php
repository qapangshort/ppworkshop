<?php
//2. query ข้อมูลจากตาราง tb_member: 
$query = "
SELECT DATE_FORMAT(log_date, '%M-%Y') AS mydate,
COUNT(ref_m_id) AS total 
FROM tbl_login_log 
GROUP BY DATE_FORMAT(log_date, '%m%')
" 
or die("Error:" . mysqli_error());

// echo $query;
// exit; 

//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($conn, $query); 
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
echo '<h4> History Login by Mounthly </h4>';
echo "<table id='example' class='display table table-bordered table-hover' cellspacing='0'>";
//หัวข้อตาราง
echo "
<thead>
<tr align='center' class='info'>
<th width='20%'>Mounthly</th>
<th width='80%'><center>Total</center></th>
</tr>
</thead>
";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td>" .$row["mydate"] .  "</td> "; 
  echo "<td align='center'>" .$row["total"] .  "</td> "; 
}
echo "</table>";
//5. close connection
mysqli_close($conn);
?>