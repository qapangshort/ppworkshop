<?php 
$queryorder = "SELECT * FROM order_head WHERE m_id=$m_id";
$rsorder = mysqli_query($conn, $queryorder);
// echo $queryorder;
?>

<h3>Order History</h3>
<table id="example" class="display table table-bordered table-hover table-striped">
	<thead>
		<tr class="info" >
			<th width="5%">#</th>
			<th width="10%">Status</th>
			<th width="10%">Date/Time</th>
			<th width="5%">Slip</th>
			<th width="10%">Ems</th>
			<th width="10%">Total</th>
			<th width="5%">View</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($rsorder as $row){ ?>
		<tr>
			<td><?php echo $row['o_id'];?></td>
			<td>
			<?php 
			$st = $row['o_status'];
          	
         	 if($st==1){
         	 	echo '<font color = "blue">';
            	echo 'Waiting for payment';
            	echo '</font>';
          	}elseif($st==2){
          		echo '<font color = "green">';
           		echo 'Paid';
           		echo '</font>';
          	}elseif($st==3){
          		echo '<font color = "orage">';
            	echo 'Check EMS number';
            	echo '</font>';
          	}else{
          		echo '<font color = "red">';
            	echo 'Cancel';
            	echo '</font>';
          }

			?></td>
			<td><?php echo $row['o_dttm'];?></td>
			<td>slip</td>
			<td><?php echo $row['o_ems'];?></td>
			<td align="right"><?php echo number_format($row['o_total'],2);?></td>
			<td>
				<?php
				$o_id = $row['o_id']; //order id
         	 if($st==1){
         	 	echo "<a href='payment.php?o_id=$o_id&do=payment' class='btn btn-primary btn-xs'>For Paid</a>";
          	}elseif($st==2){
          		echo "<a href='payment_detail.php?o_id=$o_id&do=payment_detail' class='btn btn-success btn-xs'>Paid</a>";
          	}elseif($st==3){
          		echo "<a href='payment_detail.php?o_id=$o_id&do=payment_detail' class='btn btn-info btn-xs'>Ems</a>";
          	}else{
          		echo "<a href='order_detail.php?o_id=$o_id&do=order_detail'  class='btn btn-danger btn-xs' target='_blank'>Cancel</a>";
          }
			?>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>