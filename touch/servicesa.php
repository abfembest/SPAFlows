<?php include 'toplinks2.php';
   include 'sidemenua.php' ; 
INCLUDE 'db_connect.php';
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:purple;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: white;">Select product and search</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="printpos/reprinta.php" style ="color:white;">Reprint</a></li>
              <li class="breadcrumb-item"><a href="makesalesa.php" style ="color:white;">Product sales</a></li>
              <li class="breadcrumb-item active" style ="color:white;"><a href="necusta.php" style ="color:white;">Register customer</a></li>
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
                  <a href="servicesa.php"><button class="btn btn-secondary">Back</button></a>
                  <form action="" method="GET" >  

                      <span class="form-inline"><label>Name:&nbsp&nbsp&nbsp</label>
                        <select  id="product" name="type" required="required" class="form-control select2" onchange="showUser(this.value)">
                        <option style="">
                        <?php
                        include 'db_connect.php';
                            $query = "SELECT DISTINCT * FROM perfecttouch.products";
                            $result = mysqli_query($connect, $query);    
                            while ($row = mysqli_fetch_array($result)){
                            echo "<option value='" .$row['type']."'>" . $row['type'] . "</option>";
                             } 
                          ?>
                      
                      </select>
                    
                      
                      </label>
                    
                 
                     <span>
                      <?php 
                      if (isset($_SESSION["status"])) {
                        echo $_SESSION["status"]; 
                        unset($_SESSION["status"]);
                      # code...
                    }
                    ?></span> 

                  </form> 
                 
                </h3>

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
           
             
                 
                    
           
              <!-- /.card-header -->
              <!-- form start -->
    <div id="type">
      


    </div>
  </div>
</div>

  

  
                  
                
            </div>

              </div>
             
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="col-md-10">
                
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <a href="actions/action_completea.php" style="float: right; padding-left: 2px;"> <input type="   button" name="refresh" value="Complete services" class="btn btn-danger"> 
                  </a> 
                  <a href="paymenta.php" style="float: right; padding-left: 2px;"> <input type="   button" name="refresh" value="payment" class="btn btn-info"> 
                  </a> 
                   

                <h3 class="card-title">Sales lists</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      
                       
                      <!-- text input -->
                      
                        <?php INCLUDE 'printpos/diretbla.php'; ?>
                     
                    </div>
                  </div>
         
         </div>  
         </div>   
      </div>
    </div>
  </div>
  tent-wrapper-->
  <script>
function showUser(str) {
  if (str == "") {
    document.getElementById("type").innerHTML = "This service is not available.";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("type").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","salesdbajax.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>