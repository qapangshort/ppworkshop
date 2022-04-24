<?php
include('header.php');
include('banner.php');
include('menu.php');
?>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-5">
      <h3> Register </h3>
      <form action="member_form_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
          <div class="col-sm-3 control-label">
            Level :
          </div>
          <div class="col-sm-5">
            <select name="m_level" class="form-control" required>
              <option value="MEMBER"> MEMBER </option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3 control-label">
            Username :
          </div>
          <div class="col-sm-6">
            <input type="text" name="m_username" required class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3 control-label">
            Password :
          </div>
          <div class="col-sm-6">
            <input type="password" name="m_password" required class="form-control">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3 control-label">
            Frist name :
          </div>
          <div class="col-sm-5">
            <select name="m_fname" class="form-control" required>
              <option value=""> choose </option>
              <option value="Mr."> Mr. </option>
              <option value="Miss."> Miss. </option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3 control-label">
            Name :
          </div>
          <div class="col-sm-6">
            <input type="text" name="m_name" required class="form-control">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3 control-label">
            Last name :
          </div>
          <div class="col-sm-6">
            <input type="text" name="m_lname" required class="form-control">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3 control-label">
            E-mail :
          </div>
          <div class="col-sm-6">
            <input type="email" name="m_email" required class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3 control-label">
            Phone :
          </div>
          <div class="col-sm-6">
            <input type="text" name="m_phone" required class="form-control" maxlength="11">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3 control-label">
            Profile :
          </div>
          <div class="col-sm-6">
            <input type="file" name="m_img" required class="form-control"  accept="image/*">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3">
          </div>
          <div class="col-sm-4">
            <input type="hidden" name="ref_m_id" value="<?php echo $m_id;?>">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>