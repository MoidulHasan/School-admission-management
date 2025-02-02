<?php
  include 'security.php';
  include("../conn.php");
  include("includes/header.php");
  include("includes/navber.php");

  $result = mysqli_query($con, "SELECT * FROM admission_form");
  $rows = mysqli_num_rows($result);
  $result1 = mysqli_query($con, "SELECT * FROM student_info");
  $rows1 = mysqli_num_rows($result1);
?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
            include("includes/topber.php");
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Applicats</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo " $rows "; ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Students</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo " $rows1 "; ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            

          </div>
          
          
          


            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php
      include("includes/footer.php");
      include("includes/scripts.php");
?>