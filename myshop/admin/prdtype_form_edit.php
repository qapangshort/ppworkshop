<?php 
$ID = $_GET['ID'];
$sql = "SELECT * FROM tbl_prd_type WHERE t_id=$ID";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);

// echo $sql;

// echo '<pre>';
// print_r($row);
// echo '</pre>';

?>

<h4> Edit Product Type </h4>
<form action="prdtype_form_edit_db.php" method="post" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-5 control-label">
      Name Product Type :
    </div>
    <div class="col-sm-7">
      <input type="text" name="t_name" required class="form-control" value="<?php echo $row['t_name']; ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-5">
    </div>
    <div class="col-sm-1">
      <input type="hidden" name="t_id" value="<?php echo $row['t_id']; ?>">
      <button type="submit" class="btn btn-success">Save</button>
    </div>
  </div>
</form>
