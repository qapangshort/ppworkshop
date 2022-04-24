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
              <h3> :: List Product ::</h3>
            </div>
            <?php while($row = mysqli_fetch_array($result)) { ?>
                <div class="col-sm-6 col-md-3">
                  <div class="thumbnail">
                    <img src="pimg/<?php echo $row['p_img'];?>" width='100%'>
                    <div class="caption">
                      <h3 align="center" > <?php echo $row['p_name'];?></h3>
                      <p style="color:#696969;"> Price <?php echo $row['p_price'];?> Bath.</p>
                      <p style="color:#00CC66;" ><?php echo $row['p_intro'];?></p>
                      <p><a href="detail.php?p_id=<?php echo $row['p_id'];?>" class="btn btn-primary" role="button" style="width: 100%;">Detail</a></p>
                    </div>
                  </div>
                </div>
          <?php } ?>
            </div><!--row-->
          </div><!--container-->
        <!-- end prd -->