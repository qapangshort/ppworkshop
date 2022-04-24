<?php 
//query prd
$p_id = $_GET['p_id'];
$sql = "
SELECT * 
FROM tbl_prd as p
LEFT JOIN tbl_prd_type as t ON p.ref_t_id=t.t_id
WHERE p.p_id=$p_id";

$result = mysqli_query($conn, $sql); // or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);

if(mysqli_num_rows($result) !=1){
	echo "<script type='text/javascript'>";
	echo "window.location = 'index.php'; ";
	echo "</script>";
}

// echo mysqli_num_rows($result);

// exit;

// echo $sql;


//update view
$sql2 = "UPDATE tbl_prd SET
			p_view=$p_view+1
			WHERE p_id=$p_id;					
			";
 
	$result2 = mysqli_query($conn, $sql2); // or die ("Error in query: $sql2 " . mysqli_error());
	

?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<img src="pimg/<?php echo $row['p_img'];?>" width='100%'>
		</div>
		<div class="col-md-8 col-xs-12">
			<h3><?php echo $row['p_name'];?></h3>
			<font color="red">Price <?php echo number_format($row['p_price'],2);?> Bath.</font>
			<p>
				<?php echo $row['p_detail'];?>
			</p>
			<center><p>View <?php echo $row['p_view'];?> ครั้ง</p></center>
			

			<!--ปุ่มแชร์ จากเว็ป addthis-->
			<center><p>
			<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6256b0b255f0c262"></script>
			<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox_j9be"></div>
			</p></center>
			
			<hr>
			<!--ส่วนขอวคอมเม้น-->
			<p>
				<h4>Comment About This</h4>
				<form action="comment_save.php" method="post" class="form-horizontal">
					<textarea name="c_detail" class="form-control" required></textarea>
					<br>
					<input type="hidden" name="ref_p_id" value="<?php echo $row['p_id'];?>">
					<button type="submit" class="btn btn-primary">Comment</button>
					<a href="index.php" class="btn btn-danger">Cancle</a>
				</form>
			</p>
			<p>
				<hr>
				<h4>
					Comment
					<br>
					<?php include('comment_list.php'); ?>
				</h4>
			</p>
		</div>
		
	</div>
</div>