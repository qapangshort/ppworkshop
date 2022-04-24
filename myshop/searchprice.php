<?php 
echo'
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      Form search by price
      <form action="" method="get" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-1 control-label">
            Min
          </div>
          <div class="col-sm-2">
            <input type="number" name="ps" required class="form-control">
          </div>
          <div class="col-sm-1 control-label" >
            Max
          </div>
          <div class="col-sm-2">
            <input type="number" name="pe" required class="form-control">
          </div>
          <div class="col-sm-1">
            <button type="submit" class="btn btn-success" name="act" value="p">Search</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>';
?>