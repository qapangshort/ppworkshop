<h4> Form Add Member </h4>
<form action="member_form_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
    <div class="col-sm-2 control-label">
      Level :
    </div>
    <div class="col-sm-2">
      <select name="m_level" class="form-control" required>
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
      <input type="text" name="m_username" required class="form-control" autocomplete="off">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Password :
    </div>
    <div class="col-sm-4">
      <input type="password" name="m_password" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Fname :
    </div>
    <div class="col-sm-2">
      <select name="m_fname" class="form-control" required>
        <option value=""> choose </option>
        <option value="Mr."> Mr. </option>
        <option value="Miss."> Miss. </option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      name :
    </div>
    <div class="col-sm-4">
      <input type="text" name="m_name" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      lname :
    </div>
    <div class="col-sm-4">
      <input type="text" name="m_lname" required class="form-control">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      email :
    </div>
    <div class="col-sm-4">
      <input type="email" name="m_email" required class="form-control" autocomplete="off">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      phone :
    </div>
    <div class="col-sm-4">
      <input type="text" name="m_phone" required class="form-control" maxlength="11">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      Picture :
    </div>
    <div class="col-sm-3">
      <input type="file" name="m_img" required class="form-control"  accept="image/*">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4">
      <input type="hidden" name="ref_m_id" value="<?php echo $m_id;?>">
      <button type="submit" class="btn btn-primary">Add Member</button>
    </div>
  </div>
</form>