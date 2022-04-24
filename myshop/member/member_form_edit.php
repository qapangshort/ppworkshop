<h4> Edit Profile </h4>
<form action="member_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Level :
    </div>
    <div class="col-sm-2">
      <select name="m_level" class="form-control" disabled>
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
      <input type="text" name="m_username"  class="form-control" value="<?php echo $row['m_username'];?>" disabled>
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
      Address :
    </div>
    <div class="col-sm-6">
      <input type="text" name="m_address" required class="form-control" value="<?php echo $row['m_address'];?>">
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
      Old Picture <br>
      <img src="../mimg/<?php echo $row['m_img'];?>" width="200px">
      <br>
      New Picture
      <input type="file" name="m_img"  class="form-control"  accept="image/*">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4">
      <input type="hidden" name="m_img2"  value="<?php echo $row['m_img'];?>">
      <input type="hidden" name="m_id"  value="<?php echo $row['m_id'];?>">
      <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
    </div>
  </div>
</form>