<?php 
include('header.php'); 
include('menu.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Form search member</h4>
        </div>
        <div class="col-md-12">
            <form action="" method="get" class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-3 control-label">
                        Search Phone
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="m_phone" required class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success"  name="act" value="phone">Search Member</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
$act = (isset($_GET['act']) ? $_GET['act'] : '');
if($act=='phone'){
echo '<div class="container">
    <div class="row">
        <div class="col-md-12">';
            include('member_list.php');
        echo '</div>
    </div>
</div>';
}
include('footer.php');
?>

   
    

