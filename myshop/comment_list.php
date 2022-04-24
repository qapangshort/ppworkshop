<?php
include('conn.php');
$query = "
SELECT * 
FROM tbl_comment 
WHERE ref_p_id=$p_id 
AND c_status=1
ORDER BY c_date DESC
" or die("Error:" . mysqli_error());

// echo $query;
// exit; 
 
$result = mysqli_query($conn, $query); 

echo "<table class='display table table-bordered table-hover' cellspacing='0'>";
//หัวข้อตาราง
echo "
<thead>
<tr align='center' class='info'>
<th width='5%'>No.</th>
<th width='65%'>Comment</th>
<th width='30%'>Date/Time</th>
</tr>
</thead>
";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td align='center'>" .@$i += 1 .'.'."</td> "; 
  echo "<td>" .$row["c_detail"] .  "</td> "; 
  echo "<td>" .date('d-m-Y H:i:s',strtotime($row["c_date"])) .  "</td> ";
  echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>