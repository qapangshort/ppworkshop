<?php include('hder.php'); //css
// print_r($_SESSION);
//query
$o_id = $_GET['o_id'];
$querycart = "
SELECT d.* ,p.p_img,p.p_name,p.p_price, h.*,b.bname, b.bnumber
FROM order_detail as d
INNER JOIN order_head as h ON d.o_id = h.o_id
INNER JOIN tbl_prd as p ON d.p_id = p.p_id
INNER JOIN tbl_bank as b ON h.bid = b.bid
WHERE d.o_id=$o_id
";
$rscart = mysqli_query($conn, $querycart);
$rowdetail = mysqli_fetch_array($rscart);
            //   echo'<pre>';
              //   print_r($rowdetail);
//   echo '</pre>';
$querybank = "SELECT * FROM tbl_bank";
$rsbank = mysqli_query($conn, $querybank);
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
        <h3 align="center"> Payment notice </h3>
        <h4>
        Oder Id : <?php echo $rowdetail['o_id']; ?> <br>
        Send To : <?php echo $rowdetail['o_addr']; ?><br>
        Tell : <?php echo $rowdetail['o_phone']; ?>, E-mail : <?php echo $rowdetail['o_email']; ?><br>
        Date/Time : <?php echo $rowdetail['o_dttm']; ?> <br>
        Status : <?php
        $st = $rowdetail['o_status'];
        echo '<font color="blue">';
        if($st==1){
        echo 'Waiting for payment';
        }elseif($st==2){
        echo 'Paid';
        }elseif($st==3){
        echo 'Check EMS number';
        }else{
        echo 'Cancel';
        }
        echo '</font>';
        ?>
        </h4>
        <br>
        <table class="table table-bordered table-hover table-striped">
          <tr>
            <th width="5%" bgcolor="#EAEAEA">#</th>
            <th width="10%" bgcolor="#EAEAEA">Picture</th>
            <th width="60%" bgcolor="#EAEAEA">Product</th>
            <th width="10%" align="center" bgcolor="#EAEAEA">Praice</th>
            <th width="10%" align="center" bgcolor="#EAEAEA">Quantity</th>
            <th width="5%" align="center" bgcolor="#EAEAEA">Total(Bath.)</th>
          </tr>
          <?php
          $total=0;
          foreach($rscart as $row) {
          $total += $row["d_subtotal"]; //??????????????????????????????????????????????????????
          echo "<tr>";
            echo "<td >" . $i =+ 1 . "</td>";
            echo "<td >"."<img src='../pimg/" .$row["p_img"] . "'width='50'>". "</td> ";
            echo "<td >" . $row["p_name"] . "</td>";
            echo "<td 'align='right'>" .number_format($row["p_price"],2) . "</td>";
            echo "<td 'align='right'>" .number_format($row["d_qty"],2) . "</td>";
            echo "<td ='93' align='right'>".number_format($row["d_subtotal"],2)."</td>";
          echo "</tr>";
          } //close foreach
          echo "<tr>";
            echo "<td colspan='5' bgcolor='#CEE7FF' align='center'><b>?????????????????????</b></td>";
            echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
            
          echo "</tr>";
          
          ?>
        </table>
        <h4>Payment details</h4>
        <div class="col-sm-6">
          Bank : <?php echo $rowdetail['bname'];?><br>
          Account number : <?php echo $rowdetail['bnumber'];?><br>
          Total : <?php echo $rowdetail['o_slip_total'];?> Bath.<br>
          Date : <?php echo $rowdetail['o_slip_date'];?><br>
          Slip <br>
          <img src="../imgslip/<?php echo $rowdetail['o_slip'];?>" width="80%">
        </div>
        <div class="col-sm-6">
          <h3>EMS</h3>
          <form action="ems_db.php" method="post" class="form-horizontal">
            <div class="form-group">
              <div class="col-sm-2 control-label">
                EMS
              </div>
              <div class="col-sm-6">
                <input type="text" name="o_ems" class="form-control" required minlength="4" placeholder="Ems number.">
              </div>
              <div class="col-sm-1">
                <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
                <button type="submit" class="btn btn-info">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php'); //footer?>
</body>
<?php include('js.php'); //js?>