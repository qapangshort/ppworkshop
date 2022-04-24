<?php
	session_start();
	if ($_SESSION['m_name']=='') {
	header("Location: myshop/login.php");
}
// echo '<pre>';
// 	print_r($_SESSION);
// 	echo '</pre>';

$m_id = $_SESSION['m_id'];
include('conn.php');

$qmember = "SELECT m_fname,m_name,m_lname,m_address,m_email,m_phone FROM tbl_member WHERE m_id=$m_id";
$rsmember = mysqli_query($conn,$qmember) or die ("Error in query : $qmember" . mysqli_error());
$rowmember = mysqli_fetch_array($rsmember);




// echo '<pre>';
	// print_r($rowmember);
	// 	echo '</pre>';
include('head.php');
include('banner.php');
include('menu.php');
?>
<!--start cart2 -->
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12">
			<h3>Confirm</h3>
			<form id="frmcart2" name="frmcart2" method="post" action="saveorder2.php">
				<table class="table table-bordered table-hover table-striped">
					<tr>
						<th width="5%" bgcolor="#EAEAEA">#</th>
						<th width="10%" bgcolor="#EAEAEA">Picture</th>
						<th width="60%" bgcolor="#EAEAEA">สินค้า</th>
						<th width="10%" align="center" bgcolor="#EAEAEA">Praice</th>
						<th width="10%" align="center" bgcolor="#EAEAEA">จำนวน</th>
						<th width="5%" align="center" bgcolor="#EAEAEA">Total(Bath.)</th>
					</tr>
					<?php
					$total=0;
					if(!empty($_SESSION['cart2']))
					{
						foreach($_SESSION['cart2'] as $p_id=>$qty)
						{
							$sql = "SELECT * FROM tbl_prd WHERE p_id=$p_id";
							$query = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($query);
							$sum = $row['p_price'] * $qty; // ราคาคูณจำนวนซื้อ
							$total += $sum; //ราคารวม
							echo "<tr>";
						echo "<td >" . $i =+ 1 . "</td>";
						echo "<td >"."<img src='myshop/pimg/" .$row["p_img"] . "'width='50'>". "</td> ";
						echo "<td >" . $row["p_name"] . "</td>";
						echo "<td 'align='right'>" .number_format($row["p_price"],2) . "</td>";
						echo "<td align='right'>";
							echo "<input type='number' name='amount[$p_id]' value='$qty' class='form-control' readonly /></td>";
							echo "<td ='93' align='right'>".number_format($sum,2)."</td>";
						echo "</tr>";
						} //close foreach
						echo "<tr>";
							echo "<td colspan='5' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
							echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
							
						echo "</tr>";
						}
						if($total > 0){
						?>
						
						<?php } ?>
					</table>
					<h3>Detail for send</h3>
					
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Name Lastname</label>
							<input type="text" class="form-control" name="m_name" id="inputEmail4" value="<?php echo $rowmember['m_name'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">Address</label>
						<input type="text" class="form-control" name="m_address" value="<?php echo $rowmember['m_address']; ?>">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputCity">E-mail</label>
							<input type="email" class="form-control" id="inputCity" name="m_email" value="<?php echo $rowmember['m_email']; ?>">
						</div>
						<div class="form-group col-md-6">
							<label for="inputCity">Phone</label>
							<input type="text" class="form-control" id="inputCity" name="m_phone" maxlength="11" value="<?php echo $rowmember['m_phone']; ?>" >
						</div>
						<input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
						<input type="hidden" name="total" value="<?php echo $total; ?>">
						<button type="submit" class="btn btn-primary">Buy</button>
						
					</form>
				</div>
			</div>
		</div>
		<?php include('footer.php'); ?>