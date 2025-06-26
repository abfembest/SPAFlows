<?php include 'toplinks.php';
INCLUDE 'db_connect.php';

    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background: url('images/background.jpg'); background-size: cover;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: white;">Select product and search</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" style ="color:white;">Home</a></li>
              <li class="breadcrumb-item"><a href="expenses.php" style ="color:white;">Expenses</a></li>
              <li class="breadcrumb-item active" style ="color:white;">Fixed Layout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-10">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">

            <div class="row">
               <div class="col-sm-12">
           
              <?php
                  $id = $_GET['id'];

                    $sql= "SELECT * FROM perfecttouch.staff WHERE id = '$id'";
						$result = $connect->query($sql);
				  		if ($result-> num_rows >0) {
				    	while ($row = $result-> fetch_assoc()) {
						
    	
                    ?>
                  <div class="card card-info">
                  <div class="card-header">
                <h3 class="card-title">
                      <a href="stafflist.php"><button class="btn btn-primary">Back</button></a>
                Update staff profiles here</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="actions/action_update1.php" enctype='multipart/form-data' method="POST">
                <div class="card-body">
                	<input type="hidden" name="id" value="<?php echo($id)?>">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Surname </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="category" class="wide" min="0" required="required" readonly value="<?php echo $row['surname']; ?>" >
                    </div>
                  </div> 
                </div>


                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">First name</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" id="Brand" name="quantity" class="wide" required="required" value="<?php echo $row['fname']; ?>" readonly>
                    </div>
                  </div> 
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Phone</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" id="Brand" name="quantity" class="wide" required="required" value="<?php echo $row['phone']; ?>" readonly>
                    </div>
                  </div> 
                </div>

                
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Job Description</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="JOD" id="Brand" name="jod" class="wide" min="0" required="required" >
                    </div>
                  </div> 
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Salary</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" id="brand" name="salary" min="0" class="wide" required="required">
                    </div>
                  </div> 
                </div>

                <!--<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Description:</label>
                    <div class="col-sm-8">
                      <div>
                         <textarea class="form-control" id="exampleInputPassword1" placeholder="Briefly describe the produce.." name="description" required></textarea>
                    </div>
                  </div> 
                </div>
                </div>-->   
                
                    
                    <input type="hidden" name="username" value="<?php echo $_SESSION["name"] ?>">
                  <div class="row">
                          <div class="col-lg-6" style="text-align: right;">
                          <button type="submit" name="submit" class="btn btn-info">Approvel</button>
                          </div>
                          <div class="col-lg-6 " style="text-align: left;">
                          <button type="submit" name="disaproval" class="btn btn-danger">Disaprove</button>
                        </div>
                </div>
            
                            
  </form>
  </div>
</div>

  <!--<div class="col-md-6">
                
           
            <div class="card card-warning">
              <div class="card-header">
                
                <h3 class="card-title">Preview</h3>
              </div>
              /.card-header 
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      text input
                      
                        <?php #INCLUDE 'printpos/postable2.php'; ?>
                     
                    </div>
                  </div>
         
         </div>   
      </div>
    </div>-->

  <?php
}
  }              
  //$connect->Close();
  ?>
  

                  
                
            </div>

              </div>
              <!-- /.card-body -->
                          </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper-->
