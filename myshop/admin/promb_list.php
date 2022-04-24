<?php
include('../conn.php');
$query = "SELECT * FROM tbl_problem ORDER BY p_id DESC" or die("Error:" . mysqli_error());
// echo $query;
// exit;
$result = mysqli_query($conn, $query);
echo "<table id='example' class='display table table-bordered table-hover' cellspacing='0'>";
  //หัวข้อตาราง
  echo "
  <thead>
    <tr align='center' class='info'>
      <th width='5%'>No.</th>
      <th width='50%'>Promblem</th>
      <th width='10%'>E-mail</th>
      <th width='10%'>Phone</th>
      <th width='25%'>Date/Time</th>
    </tr>
  </thead>
  ";


  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>" .$row["p_id"] ."</td> "; 
    echo "<td>" .$row["p_detail"] .  "</td> ";
    echo "<td>" .$row["p_email"] .  "</td> ";
    echo "<td>" .$row["p_phone"] .  "</td> ";
    echo "<td>" .date('d-m-Y H:i:s',strtotime($row["p_datesave"])) .  "</td> ";
    }
  echo "</table>";
  //5. close connection
  mysqli_close($conn);
  ?>