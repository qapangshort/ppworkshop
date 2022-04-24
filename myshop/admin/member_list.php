<?php
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM tbl_member ORDER BY m_id ASC" or die("Error:" . mysqli_error());
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
    <th width='20%'>Picture</th>
    <th width='10%'>Username</th>
    <th width='20%'>Name</th>
    <th width='10%'>E-mail</th>
    <th width='5%'>Phone</th>
    <th width='20%'>Date/Time</th>
    <th width='5%'>Edit</th>
    <th width='5%'>Delete</th>
  </tr>
  </thead>
  ";
  // $i=1;
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    // echo "<td>" .$i .  "</td> ";
    echo "<td align='center'>" .$row["m_id"] .'.'  ."</td> ";
    echo "<td>"."<img src='../mimg/".$row['m_img']."' width='100'>"."</td>";
    echo "<td>" .$row["m_username"] .  "</td> ";
    //echo "<td>" .$row["p_name"] .  "</td> ";
    echo "<td>"
      .$row["m_fname"]
      .$row["m_name"]
      .' '
      .$row["m_lname"];
      echo '<br>';
      echo 'Level ='.$row["m_level"];
    echo "</td> ";
    echo "<td>" .$row["m_email"] .  "</td> ";
    echo "<td>" .$row["m_phone"] .  "</td> ";
    echo "<td align='center'>" .date('d/m/Y',strtotime($row["m_datesave"])) .  "</td> ";
    //แก้ไขข้อมูล
    echo "<td align='center'>
      <a href='member.php?ID=$row[0]&act=edit' class='btn btn-warning btn-xs'>edit</a>
      <br><br>
      <a href='member.php?ID=$row[0]&act=rwd' class='btn btn-primary btn-xs'>resetpassword</a>
    </td> ";
    
    //ลบข้อมูล
    echo "<td align='center'>
      <a href='member_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>del</a></td> ";
    echo "</tr>";
    // $i++;
    }
  echo "</table>";
  //5. close connection
  mysqli_close($conn);
  ?>