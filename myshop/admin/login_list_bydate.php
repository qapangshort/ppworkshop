<h4>pls chooes date start and end!</h4>
<form action="" method="get" name="q" class="form-horizontal">
  <div class="form-group">
  <div class="col-sm-1 control-label">
    start
  </div>
  <div class="col-sm-3">
    <input type="date" name="ds" class="form-control" required>
  </div>
  <div class="col-sm-1 control-label">
    end
  </div>
  <div class="col-sm-3">
    <input type="date" name="de" class="form-control" required>
  </div>
  <div class="col-sm-1">
    <button type="submit" class="btn btn-success" name="act" value="bydate">Search</button>
  </div>
  </div>
</form>

<?php

@$ds =$_GET['ds'];
@$de =$_GET['de'];

if ($ds=='') {
  
}else{


//2. query ข้อมูลจากตาราง tb_member: 
$query = "
SELECT l.ref_m_id, m.m_name ,l.log_date 
FROM tbl_login_log as l 
INNER JOIN tbl_member as m ON l.ref_m_id=m.m_id
 WHERE l.log_date 
 BETWEEN '$ds 00:23:04.000000' 
 AND '$de 23:23:04.000000' 
 ORDER BY l.log_id DESC;
" 
or die("Error:" . mysqli_error());

// echo $query;
// exit; 

//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($conn, $query); 
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
echo '<h4> ประวัติการ Login by User </h4>';
echo "<table id='example' class='display table table-bordered table-hover' cellspacing='0'>";
//หัวข้อตาราง
echo "
<thead>
<tr align='center' class='info'>
<th width='10%'><center>No.</center></th>
<th width='20%'>Nameuser</th>
<th width='70%'><center>Date/Time</center></th>
</tr>
</thead>
";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td align='center' >" .$i += 1 .  "</td> ";
  echo "<td>" .$row["m_name"] .  "</td> "; 
  echo "<td align='center'>" .date('d/m/Y H:i:s', strtotime($row["log_date"])) .  "</td> "; 
}
echo "</table>";
}
//5. close connection
mysqli_close($conn);
?>