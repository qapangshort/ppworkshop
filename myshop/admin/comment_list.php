<?php
$query = "SELECT * FROM tbl_comment ORDER BY c_id DESC" or die("Error:" . mysqli_error());
$result = mysqli_query($conn, $query);  

echo "<table id='example' class='display table table-bordered table-hover' cellspacing='0'>";
//หัวข้อตาราง
echo "
<thead>
<tr align='center' class='danger'>
<th width='5%'>#</th>
<th width='50%'>Comment</th>
<th width='15%'>Status</th>
<th width='25%'>Date/Time</th>
<th width='5%'>Change</th>
</tr>
</thead>
";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td align='center'>" .$row["c_id"] .'.'. "</td> "; 
  echo "<td>"; 
  echo $row["c_detail"]; 
  echo "<a href='prd.php?ID=$row[ref_p_id]&act=edit' class='btn btn-success btn-xs' target='_blank'> open</a>";
  echo "</td>";
  echo "<td>"; 
  $c_status = $row["c_status"];
  if($c_status==0){
    echo '<font color="orange">';
    echo 'wait to accept';
    echo '</font>';
  }else{
    echo '<font color="green">';
    echo 'accept';
    echo '</font>';
  }
  echo "</td> ";
  echo "<td>" .$row["c_date"] .  "</td> "; 
  //แก้ไขข้อมูล
  echo "<td>
  <a href='comment_status_db.php?c_id=$row[0]&c_status=$c_status' class='btn btn-info btn-xs'>Change</a></td> ";
  echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($conn);
?>