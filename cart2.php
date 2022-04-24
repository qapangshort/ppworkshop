<?php
	session_start();
	if(@$_SESSION['m_name']== ''){
echo "<script type='text/javascript'>";
echo "alert('Please login');";
echo "window.location = 'myshop/login.php'; ";
echo "</script>";
}



include('conn.php');
@$p_id = mysqli_real_escape_string($conn , $_GET['p_id']);
$act = mysqli_real_escape_string($conn ,$_GET['act']);
if($act=='add' && !empty($p_id))
{
if(isset($_SESSION['cart2'][$p_id]))
{
$_SESSION['cart2'][$p_id]++;
}
else
{
$_SESSION['cart2'][$p_id]=1;
}
}
if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
{
unset($_SESSION['cart2'][$p_id]);
}
// update cart2
if($act=='update')
{
$amount_array = $_POST['amount'];
foreach($amount_array as $p_id=>$amount)
{
$_SESSION['cart2'][$p_id]=$amount;
}
}
//cancle
if($act=='cancel')  //ยกเลิกการสั่งซื้อ
{
unset($_SESSION['cart2']);
}
include('head.php');
include('banner.php');
include('menu.php');
?>
<!--start cart2 -->
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12">
			<h3>Cart <a href="index.php" class="btn btn-primary btn-sm">Back to Home</a></h3>
			<form id="frmcart2" name="frmcart2" method="post" action="?act=update">
				<table class="table table-bordered table-hover">
					<tr>
						<th width="5%" bgcolor="#EAEAEA">#</th>
						<th width="10%" bgcolor="#EAEAEA">Picture</th>
						<th width="55%" bgcolor="#EAEAEA">สินค้า</th>
						<th width="10%" align="center" bgcolor="#EAEAEA">Praice</th>
						<th width="10%" align="center" bgcolor="#EAEAEA">จำนวน</th>
						<th width="5%" align="center" bgcolor="#EAEAEA">Total(Bath.)</th>
						<th width="5%" align="center" bgcolor="#EAEAEA">Delete</th>
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
							$p_qty = $row['p_qty']; //stock
							echo "<tr>";
														echo "<td >" . @$i =+ 1 . "</td>";
														echo "<td >"."<img src='myshop/pimg/" .$row["p_img"] . "'width='100'>". "</td> ";
														echo "<td >" 
														. $row["p_name"] 
														."<br>"
														.'Stock : '
														. $row["p_qty"]
														 ."</td>";
														echo "<td 'align='right'>" .number_format($row["p_price"],2) . "</td>";
														echo "<td align='right'>";
																	echo "<input type='number' name='amount[$p_id]' value='$qty' class='form-control' min='1' max='$p_qty'/></td>";
																	echo "<td ='93' align='right'>".number_format($sum,2)."</td>";
																					//remove product
																	echo "<td align='center'><a href='cart2.php?p_id=$p_id&act=remove' class='btn btn-danger btn-sm'>Delete</a></td>";
														echo "</tr>";
													}
													echo "<tr>";
																				echo "<td colspan='5' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
																				echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
																				echo "<td align='left' bgcolor='#CEE7FF'></td>";
													echo "</tr>";
												}
												if($total > 0){
						?>
						<tr>
							
							<td colspan="7" align="right">
								<input type="button" name="btncancel" value="Cancel" class="btn btn-danger" onclick="window.location='cart2.php?act=cancel';" />
								<input type="submit" name="button" id="button" value="Change" class="btn btn-warning" />
								<input type="button" name="Submit2" value="Confrim" class="btn btn-success" onclick="window.location='confirm2.php';" />
							</td>
						</tr>
						<?php }else{
							echo '<h4 align="center"> - There are no products in the cart. Please select a new product. </h4>';
						} ?>
					</table>
				</form>
			</div>
		</div>
	</div>
	<?php include('footer.php'); ?>