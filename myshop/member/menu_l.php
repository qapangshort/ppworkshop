<img src="../mimg/<?php echo $m_img;?>" alt="" width="100%">
<hr>
Last Login : <?php echo date('d/m/Y' ,strtotime($lastlogin)); ?>
<hr>

<div class="list-group">
	<a href="index.php" class="list-group-item active">
		Home
	</a>
	<a href="index.php?act=edit" class="list-group-item ">Edit Profile</a>
	<a href="index.php?act=pwd" class="list-group-item ">Reset Password</a>
	<!-- <a href="prd.php" class="list-group-item">Product</a> -->
	<a href="../logout.php" onclick="return confirm('Confirm?');" class="list-group-item list-group-item-danger">Log out</a>
</div>