<?php include('hder.php'); //css
// print_r($_SESSION);
//query
$o_id = $_GET['o_id'];
$querycart = "
SELECT d.* ,p.p_img,p.p_name,p.p_price, h.*
FROM order_detail as d
INNER JOIN order_head as h ON d.o_id = h.o_id
INNER JOIN tbl_prd as p ON d.p_id = p.p_id
WHERE d.o_id=$o_id
AND h.m_id=$m_id";
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
        <h3 align="center"> Notice of payment</h3>
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
        <h4>Choose a bank to pay</h4>
        <form action="payment_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
          <?php
          echo'<table class="table table-bordered table-hover table-striped">
            <tr>
              <th width="10%" bgcolor="#EAEAEA">#</th>
              <th width="20%" bgcolor="#EAEAEA">Bank</th>
              <th width="30%" bgcolor="#EAEAEA">Account number</th>
              <th width="40%" align="center" bgcolor="#EAEAEA">Account holder name</th>
            </tr>';
            foreach($rsbank as $rsb) {
            $bid =$rsb["bid"];
            echo'<tr>';
              echo "<td align='center'>" . "<input type='radio' require name='bid' value='$bid'>" . "</td>";
              echo "<td >" . $rsb["bname"] . "</td>";
              echo "<td >" . $rsb["bnumber"] . "</td>";
              echo "<td >" . $rsb["bowner"] . "</td>";
            echo '</tr>';
            }
          echo'</table>';
          ?>
          <div class="form-group">
            <div class="col-md-4">
              Date/Time<br>
              <input type="date" name="o_slip_date" class="form-control" required>
            </div>
            <div class="col-md-3">
              Total<br>
              <input type="number" name="o_slip_total" class="form-control" any required min="0" value="<?php echo $total; ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              Slip<br>
              <input type="file" name="o_slip" required class="form-control" accept="image/*">
            </div>
            <div class="col-md-2">
              <br>
              <input type="hidden" name="o_id" value="<?php echo $o_id; ?>">
              <input type="hidden" name="o_id" value="<?php echo $o_id; ?>">
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include('footer.php'); //footer?>
</body>
<?php include('js.php'); //js?>