<?php
$queryorder = "SELECT * FROM order_head WHERE o_status=1";
$rsorder = mysqli_query($conn, $queryorder);
// echo $queryorder;
?>
<!-- <?php
// echo round(abs(strtotime("2016-11-22") - strtotime("2016-11-29"))/60/60/24);
// echo 'วัน';
?> -->
<h3>Pending list</h3>
<table id="example" class="display table table-bordered table-hover table-striped">
	<thead>
		<tr class="info" >
			<th width="5%">#</th>
			<th width="50%">Name member</th>
			<th width="10%">Date/Time</th>
			<th width="10%">Total</th>
			<th width="10%">Day</th>
			<th width="5%">View</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($rsorder as $row){
			$o_id = $row['o_id']; //order id
		 ?>
		<tr>
			<td><?php echo $row['o_id'];?></td>
			<td>
				<?php
				echo $row['o_name'];
				echo '<br>';
				echo $row['o_addr'];
				echo '<br>';
				echo 'Tell : '.$row['o_phone'].' E-mail :'.$row['o_email'];
			?></td>
			<td><?php echo $row['o_dttm'];?></td>
			<td align="right"><?php echo number_format($row['o_total'],2);?></td>
			<td>
				<?php
				$o_dttm =date('Y-m-d', strtotime($row['o_dttm'])); //วันที่สั่งซื้อ
				$datenow =date('Y-m-d'); //วันที่สั่งซื้อ

				$caldate = round(abs(strtotime("$o_dttm") - strtotime("$datenow"))/60/60/24);

				echo $caldate. 'Day';
				echo "<br>";
				if($caldate > 3){
					echo "<a href='order_detail.php?o_id=$o_id&do=order_cancel' class='btn btn-danger'>Cancel</a>";
				}else{
					echo '-';
				}
				?>
			</td>
			<td>
				<?php
				
				
				echo "<a href='order_detail.php?o_id=$o_id&do=order_detail' class='btn btn-info btn-xs'>View</a>";
				
				?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>