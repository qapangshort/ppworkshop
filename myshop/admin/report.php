<?php include('hder.php'); //css
?>
<body>
  <?php include('nav.php'); //menu?>
  <!-- content -->
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <?php include('menu_l.php');?>
      </div>
      <div class="col-md-10">
        <h3 align="center"> Report
        </h3>
        <a href="report.php" class="btn btn-warning ">Day</span></a>
        <a href="report.php?act=m" class="btn btn-success ">Mont </a>
        <a href="report.php?act=y" class="btn btn-info ">Year </a>
        <a href="report.php?act=date" class="btn btn-danger ">Day by day</span></a>
        <?php
        $act = (isset($_GET['act']) ? $_GET['act'] : '');
        if($act=='m'){
        include('report_m.php');
        }elseif($act=='y'){
        include('report_y.php');
        }elseif($act=='date'){
        include('report_d.php');
        
        }elseif($act=='ragedate'){
        include('report_ragedate.php');
        }else{
        include('report_d.php');
        }
        ?>
      </div>
    </div>
  </div>
  <?php include('footer.php'); //footer?>
</body>
<?php include('js.php'); //js?>