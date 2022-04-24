<?php
$query = "
SELECT t.*, COUNT(p.p_id) as ptotal 
FROM tbl_prd_type as t
LEFT JOIN tbl_prd as p ON t.t_id=p.ref_t_id
GROUP BY t.t_id
" 
or die("Error:" . mysqli_error()); 
$result = mysqli_query($conn, $query); 


 ?>

 <!-- start menu -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Myshop</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li><a href="report_pb.php">Report</a></li>
                  <li><a href="report_pb2.php">Report2</a></li>
                  <!-- <li><a href="asses.php">Asses</a></li> -->
                  <!-- <li><a href="login.php">Login</a></li> -->
                 <!--  <li><a href="register.html">สมัครสมาชิก</a></li>
                  <li><a href="prdtype.html">เพิ่มประเภทสินค้า</a></li>
                  <li><a href="prd.html">เพิ่มสินค้า</a></li> -->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product type <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                     <?php while($row = mysqli_fetch_array($result)) { ?>
                      <li><a href="index.php?act=showbytype&t_id=<?php echo $row["t_id"];?>&name=<?php echo $row["t_name"]; ?>">
                        <?php echo $row["t_name"]; ?>
                          (<?php echo $row["ptotal"];?>)
                        </a></li>
                    <?php } ?>
                    </ul>
                  </li>
                </ul>
                 
                <ul class="nav navbar-nav navbar-right">
                  <!-- <li><a href="#">Link</a></li> -->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">You are member? <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                      <li><a href="register.php">Register</a></li>
                      <li><a href="login.php">Login</a></li>
                    </ul>
                  </li>
                </ul>
                <form class="navbar-form navbar-right" method="get" action="index.php">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="search" required>
                  </div>
                  <button type="submit" name="act" value="q" class="btn btn-success">Search</button>
                </form> 
                </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
              </nav>
            </div>
     
          </div>
        </div>
        <!-- end menu -->