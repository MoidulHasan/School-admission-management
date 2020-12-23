<?php
  include 'security.php';
  include("includes/header.php");
  include("includes/navber.php");
?>



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php
            include("includes/topber.php");
        ?>
        <!-- End of Topbar -->



<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Registration Application</h1>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Applicants list</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?php
 
                  if($con === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                  }
                  else{
                    $sql = "SELECT * FROM admission_form";
                  }
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name           </th>
                      <th>Mobile</th>
                      <th>Gender</th>
                      <th>Payment Number</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $result = $con->query($sql);

                        if (mysqli_num_rows($result) > 0) {
                        
                            while($row = mysqli_fetch_assoc($result)) {
                              ?>
                            <tr>
                                <td><?php echo $row["fname"]," ",$row["lname"];  ?></td>
                                <td><?php echo $row["phone"];  ?></td>
                                <td><?php echo $row["gender"];  ?></td>
                                <td><?php echo $row["paymentnumber"];  ?></td>
                                <td><?php echo $row["email"];  ?></td>
                                
                                <td class="text-center"><input type="image" src="https://i.ibb.co/GTDGd2G/view.png" alt="view" border="0" width="30" height="30"   id="<?php echo $row["admission_id"]; ?>" class=" view_data" /><br> 
                                <input type="image" src="https://i.ibb.co/cwCZGh9/approve.png" alt="approve" border="0" width="30" height="30"  id="<?php echo $row["admission_id"]; ?>" class=" approve" /><br>
                                <input type="image" src="https://i.ibb.co/s5MCkyz/delete.png" alt="delete" border="0" width="30" height="30"  name="delete"  value="delete" id="<?php echo $row["admission_id"]; ?>" class=" delete" /></td> 
                            </tr>
                    <?php
                          }
                        }
                        else{
                          echo "No Application Today";
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



 
        </div>
        <!-- /.container-fluid -->
        


 
 
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  
  

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../login">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>





 
       <!-- Applicants Details -->
<div id="dataModal" class="modal fade" >  
      <div class="modal-dialog modal-lg">  
           <div class="modal-content">  
                <div class="modal-header">  
                <h4 class="modal-title">Applicant's Details</h4>  
              <button type="button" class="close" data-dismiss="modal">&times;</button>  
                 </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="admission_req.php">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <!-- /Applicants Details -->
 

 
 
 
 
 <!-- PHP Ajax Update MySQL Data Through Bootstrap Modal -->
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                       <h4 class="modal-title">Edit Applicants data</h4>  
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Enter Employee Name</label>  
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />  
                          <label>Enter Employee Address</label>  
                          <textarea name="address" id="address" class="form-control"></textarea>  
                          <br />  
                          <label>Select Gender</label>  
                          <select name="gender" id="gender" class="form-control">  
                               <option value="Male">Male</option>  
                               <option value="Female">Female</option>  
                          </select>  
                          <br />  
                          <label>Enter Designation</label>  
                          <input type="text" name="designation" id="designation" class="form-control" />  
                          <br />  
                          <label>Enter Salary</label>  
                          <input type="text" name="salary" id="salary" class="form-control" />  
                          <br />  
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 
  <!-- / PHP Ajax Update MySQL Data Through Bootstrap Modal -->

<script>  
 $(document).ready(function() {
    $('#add').click(function() {
        $('#insert').val("Insert");
        $('#insert_form')[0].reset();
    });
    $(document).on('click', '.edit_data', function() {
        var id = $(this).attr("id");
        $.ajax({
            url: "fetch.php",
            method: "POST",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                $('#name').val(data.student_name);
                $('#address').val(data.address);
                $('#gender').val(data.gender);
                $('#designation').val(data.designation);
                $('#salary').val(data.salary);
                $('#employee_id').val(data.id);
                $('#insert').val("Update");
                $('#add_data_Modal').modal('show');
            }
        });
    });
    $('#insert_form').on("submit", function(event) {
        event.preventDefault();
        if ($('#name').val() == "") {
            alert("Employee Name Required");
        } else if ($('#address').val() == '') {
            alert("Employee Address Required");
        } else if ($('#designation').val() == '') {
            alert("Employee Designation Required");
        } else if ($('#salary').val() == '') {
            alert("Employee Salary Required");
        } else {
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: $('#insert_form').serialize(),
                beforeSend: function() {
                    $('#insert').val("Inserting");
                },
                success: function(data) {
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#employee_table').html(data);
                }
            });
        }
    });
    $(document).on('click', '.view_data', function() {
        var id = $(this).attr("id");
        if (id != '') {
            $.ajax({
                url: "select.php",
                method: "POST",
                data: {
                    id: id
                },
                
                success: function(data) {
                    $('#employee_detail').html(data);
                    $('#dataModal').modal('show');
                    $(this).remove();
                }
            });
        }
    });
    
    $(document).on('click', '.approve', function() {
        var id = $(this).attr("id");
        if (id != '') {
            $(this).closest('tr').remove();
            $.ajax({
                url: "approve.php",
                method: "POST",
                data: {
                    id: id
                },
                
                success: function(data) {
                    $('#employee_detail').html(data);
                    $('#dataModal').modal('show');
                }
            });
        }
    });
    
     // Delete 
 $('.delete').click(function(){
   var el = this;
  
   // Delete id
   var deleteid = $(this).attr("id");
 
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'delete.php',
        type: 'POST',
        data: { id:deleteid },
        success: function(response){

          if(response == 1){
	    // Remove row from HTML Table
	    $(el).closest('tr').css('background','tomato');
	    $(el).closest('tr').fadeOut(800,function(){
	       $(this).remove();
	    });
          }else{
	    alert('Invalid ID.');
          }

        }
      });
   }

 });
    

});
 </script> 
 
 
 
</body>

</html>
