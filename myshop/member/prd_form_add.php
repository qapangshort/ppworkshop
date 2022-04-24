<?php 
$query = "SELECT * FROM tbl_prd_type" or die("Error:" . mysqli_error());
$result = mysqli_query($conn, $query);
?>
<h4> Add Product </h4>
<form action="prd_form_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ประเภท :
    </div>
    <div class="col-sm-4">
      <select name="ref_t_id" class="form-control" required>
        <option value=""> choose </option>
        <?php foreach($result as $results){ ?>
        <option value="<?php echo $results["t_id"];?>">
          <?php echo $results["t_name"];?>
          </option>
      <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Name Product :
    </div>
    <div class="col-sm-7">
      <input type="text" name="p_name" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Detail :
    </div>
    <div class="col-sm-10">
      <textarea name="p_detail" class="form-control" required id="editor"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Price :
    </div>
    <div class="col-sm-2">
      <input type="number" name="p_price" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Picture :
    </div>
    <div class="col-sm-3">
      <input type="file" name="p_img" required accept="image/*" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4">
       <input type="hidden" name="ref_m_id"  value="<?php echo $m_id;?>">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>
<script>
initSample();
</script>