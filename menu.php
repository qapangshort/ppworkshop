<!--start  menu -->
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Myshop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item active">
              <a class="nav-link" href="#">contract</a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="myshop/register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Login</a>
            </li> -->
            
            
            
            <?php
            if(!empty($_SESSION['m_name'])){
            echo '<li class="nav-item">
              <a class="nav-link" href="myshop/member">';
                echo 'Wellcome:' . $_SESSION['m_name'];
              echo '</a></li>';
              echo '<li class="nav-item">
                <a class="nav-link" href="myshop/logout.php"> Logout</a></li>';
                }
                ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    member?
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="myshop/register.php">Register</a>
                    <!--  <a class="dropdown-item" href="#">Another action</a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="myshop/login.php">Login</a>
                  </div>
                </li> 
              </ul>
              <ul class="nav navbar-right">
                 <form class="form-inline my-2 my-lg-0 ">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              </ul>
             
            </div>
          </nav>
        </div>
      </div>
    </div>
    <!--end  menu -->