<?php
$query = "
SELECT * FROM tbl_prd ORDER BY p_id DESC" 
or die("Error:" . mysqli_error());
// echo $query;
// exit; 

$result = mysqli_query($conn, $query); 

?>
        <!-- start prd -->
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-md-12">
              <h3> List product </h3>
            </div>
            <?php while($row = mysqli_fetch_array($result)) { ?>
            <div class="col-xs-12 col-sm-4 col-md-4" style="margin-bottom: 20px;">
              <img src="pimg/<?php echo $row['p_img'];?>" width='100%'>
              <p align="center"> <?php echo $row['p_name'];?> </p>
              <p align="center">
                <a href="#" class="btn btn-success btn-xs">asc</a>
              </p>
            </div>
          <?php } ?>
            </div><!--row-->
          </div><!--container-->
        <!-- end prd -->