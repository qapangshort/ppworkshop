<?php
include('../conn.php');
//2. query ข้อมูลจากตาราง tb_member: 
$query = "
SELECT p.*,m.m_name,t.t_name
FROM tbl_prd as p
LEFT JOIN tbl_member as m ON p.ref_m_id=m.m_id
INNER JOIN tbl_prd_type as t ON p.ref_t_id=t.t_id
ORDER BY p.p_id ASC" 
or die("Error:" . mysqli_error());

// echo $query;
// exit; x

//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($conn, $query); 
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

echo "<table id='example' class='display table table-bordered table-hover' cellspacing='0'>";
//หัวข้อตาราง
echo "
<thead>
<tr align='center' class='info'>
<th>No.</th>
<th>Product Type</th>
<th>Pictuer</th>
<th>Name</th>
<th>Price</th>
<th>View</th>
<th>Add By</th>
<th>Date/Time</th>
<th>Edite</th>
<th>Delete</th>
</tr>
</thead>
";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td align='center'>" .$row["p_id"] .'.'."</td> "; 
  echo "<td>" .$row["t_name"] .  "</td> "; 
  echo "<td>"."<img src='../pimg/" .$row["p_img"] . "'width='100'>". "</td> "; 
  echo "<td>" .$row["p_name"] .  "</td> ";
  echo "<td>" .$row["p_price"] .  "</td> ";  
  echo "<td align='center'>" .$row["p_view"] .  "</td> ";
  echo "<td>" .$row["m_name"] ;

  if($row["p_m_name"]!=''){
    echo '<br>'
    .'Edit By '
    . $row["p_m_name"]
    . '<br>'
    .'d/m/y'
   . date('d/m/Y H:i:s', strtotime($row["p_m_edit_date"]));

  }
  
  echo "</td> ";
  echo "<td>" .date('d-m-Y',strtotime($row["p_datesave"])) .  "</td> ";

  //แก้ไขข้อมูล
  echo "<td align='center'>
  <a href='prd.php?ID=$row[0]&act=edit' class='btn btn-warning btn-xs'>Edit</a></td> ";
  
  //ลบข้อมูล
  echo "<td align='center'>
  <a href='prd_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>Delete</a></td> ";

  echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($conn);
?>