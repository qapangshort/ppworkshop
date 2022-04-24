<?php 
include('header.php'); 
include('banner.php');
include('menu.php');

?>
        <!-- start form login-->
        <div class="container">
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5">
              <h3> Form Login </h3>
              <form action="chklogin.php" method="post" class="form-horizontal">
                 <div class="form-group">
                  <div class="col-sm-3 control-label">
                    Username : 
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="m_username" required placeholder="enter your username" class="form-control">
                  </div>
                 </div>
                 <div class="form-group">
                  <div class="col-sm-3 control-label">
                    Password : 
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="m_password" required placeholder="Enter your password" class="form-control">
                  </div>
                 </div>
                 <div class="form-group">
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                 </div>
              </form>
            </div>
          </div>
        </div>
        <!-- end form-->

 <?php include('footer.php'); ?>