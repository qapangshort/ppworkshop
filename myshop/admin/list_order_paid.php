<?php 
$queryorder = "SELECT * FROM order_head WHERE o_status=2";
$rsorder = mysqli_query($conn, $queryorder);
// echo $queryorder;
?>

<h3>Pending list</h3>
<table id="example" class="display table table-bordered table-hover table-striped">
	<thead>
		<tr class="info" >
			<th width="5%">#</th>
			<th width="50%">Name member</th>
			<th width="10%">Date/Time</th>
			<th width="10%">Total</th>
			<th width="10%">Slip</th>
			<th width="5%">View</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($rsorder as $row){ ?>
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
			<td align="right">
				<a href="../imgslip/<?php echo $row['o_slip'];?>" target="_blank">
				<img src="../imgslip/<?php echo $row['o_slip'];?>" width="100%"></td>
			<td>
				<?php
				$o_id = $row['o_id']; //order id
         	 
          		echo "<a href='payment_detail.php?o_id=$o_id&do=payment_detail' class='btn btn-info btn-xs'>View</a>";
          	
			?>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>