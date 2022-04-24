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
              <h3> Report a problem </h3>
              <form action="report_pb_db.php" method="post" class="form-horizontal">
                 <div class="form-group">
                  <div class="col-sm-3 control-label">
                    Promblem : 
                  </div>
                  <div class="col-sm-9">
                   <textarea name="p_detail" required class="form-control" ></textarea>
                  </div>
                 </div>
                 <div class="form-group">
                  <div class="col-sm-3 control-label">
                    E-mail : 
                  </div>
                  <div class="col-sm-9">
                    <input type="email" name="p_email" required placeholder="Enter your email" class="form-control">
                  </div>
                 </div>
                 <div class="form-group">
                  <div class="col-sm-3 control-label">
                    Phone : 
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="p_phone" required placeholder="Enter your phone" class="form-control" maxlength="11">
                  </div>
                 </div>
                 <div class="form-group">
                  <div class="col-sm-3 ">         
                  </div>
                  <div class="col-sm-9">
                    <button type="submit" class="btn btn-danger">Send report</button>
                  </div>
                 </div>
              </form>
            </div>
          </div>
        </div>
        <!-- end form-->

<?php include('footer.php'); ?>