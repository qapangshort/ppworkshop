<?php include('hder.php'); //css ?>
<body>
  <?php include('nav.php'); //menu?>
  <!-- content -->
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <?php include('menu_l.php');?>
      </div>
      <div class="col-md-10">
        <h3 align="center"> Admin Page 
        <br>
        Wellcome <?php echo $m_name; ?>
        </h3>
        <p>
          <a href="counter_view.php?act=byuser" class="btn btn-info">by User</a>
          <a href="counter_view.php?act=bym" class="btn btn-success">by monthly</a>
          <a href="counter_view.php?act=byy" class="btn btn-warning">by year</a>
          <a href="counter_view.php?act=bydate" class="btn btn-primary">by date</a>
        </p>
        <?php
         $act = (isset($_GET['act']) ? $_GET['act'] : '');

       if($act=='log_login'){
        include('login_list.php');
       }elseif($act=='byuser'){
        include('login_list_byuser.php');
       }elseif($act=='bym'){
        include('login_list_bym.php');
       }elseif($act=='byy'){
        include('login_list_byy.php');
       }elseif($act=='bydate'){
        include('login_list_bydate.php');
       }else{
        include('counter.php');
      }
        ?>
      </div>
    </div>
  </div>
  <?php include('footer.php'); //footer?>
</body>
<?php include('js.php'); //js?>