<?php 
//query prd
$ID = $_GET['ID'];
$sql = "
SELECT * 
FROM tbl_member 
WHERE m_id=$ID";

$result = mysqli_query($conn, $sql);// or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);

if(mysqli_num_rows($result) !=1){
  echo "<script type='text/javascript'>";
  echo "window.location = 'index.php'; ";
  echo "</script>";
}
// echo $sql;

// echo '<pre>';
// print_r($row);
// echo '</pre>';
?>
<h4> Edit member </h4>
<form action="member_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
    <div class="col-sm-2 control-label">
      Level :
    </div>
    <div class="col-sm-2">
      <select name="m_level" class="form-control" required>
        <option value="<?php echo $row['m_level'];?>"> <?php echo $row['m_level'];?> </option>
        <option value=""> choose </option>
        <option value="ADMIN"> ADMIN </option>
        <option value="MEMBER"> MEMBER </option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Username :
    </div>
    <div class="col-sm-4">
      <input type="text" name="m_username" required class="form-control" value="<?php echo $row['m_username'];?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Fristname :
    </div>
    <div class="col-sm-2">
      <select name="m_fname" class="form-control" required>
        <option value="<?php echo $row['m_fname'];?>"> <?php echo $row['m_fname'];?> </option>
        <option value="mr"> Mr. </option>
        <option value="miss"> Miss. </option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Name :
    </div>
    <div class="col-sm-4">
      <input type="text" name="m_name" required class="form-control" value="<?php echo $row['m_name'];?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Lastname :
    </div>
    <div class="col-sm-4">
      <input type="text" name="m_lname" required class="form-control" value="<?php echo $row['m_lname'];?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      E-mail :
    </div>
    <div class="col-sm-4">
      <input type="email" name="m_email" required class="form-control" autocomplete="off" value="<?php echo $row['m_email'];?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Phone :
    </div>
    <div class="col-sm-4">
      <input type="text" name="m_phone" required class="form-control" maxlength="11" value="<?php echo $row['m_phone'];?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      Pictuer :
    </div>
    <div class="col-sm-3">
      Old Pictuer <br>
      <img src="../mimg/<?php echo $row['m_img'];?>" width="200px">
      <br>
      New pictuer
      <input type="file" name="m_img"  class="form-control"  accept="image/*">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4">
      <input type="hidden" name="m_img2"  value="<?php echo $row['m_img'];?>">
      <input type="hidden" name="m_id"  value="<?php echo $row['m_id'];?>">
      <button type="submit" class="btn btn-primary">Save edit</button>
    </div>
  </div>
</form>