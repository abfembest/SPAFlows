<?php
include 'db_connect.php';
include 'toplinks.php';
//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
	$id = $_GET['id'];

	$sql = "SELECT * FROM perfecttouch.products WHERE id = '$id'";
			$result = $connect->query($sql);
			if ($result-> num_rows >0) {
          		while ($row = $result-> fetch_assoc()) {
          			$id = $row['id'];
          			$category = $row['category'];
          			$type = $row['type'];
          			$price = $row['price'];
          		        			

          		?>
          

			
			<section class="content">

      <div class="container-fluid" style="max-width: 60%;">

        <div class="row">
          <div class="col-10">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title btn-primary">UPDATE SERVISE RECORDS</h3>
                  
                
                 
               

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body" >
            <div class="row" >
               <div class="col-sm-12">
           
                  <div class="card card-info">
                  <div class="card-header">

                <h3 class="card-title"><a href="../debtsrpt.php"><button class="btn btn-secondary">Back</button></a></h3>

              </div>
				<form class="form-horizontal" action="action_updatecustomer.php" enctype='multipart/form-data' method="POST">
                <div class="card-body">
                	<input type="hidden" name="id" value="<?php echo $id;?>">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Category </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="category" class="wide" min="0" required="required" value="<?php echo $category;?>" >
                    </div>
                  </div> 
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Service type</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="type" class="wide" min="0" required="required" value="<?php echo ($type) ?>" >
                    </div>
                  </div> 
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Price </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="price" class="wide" min="0" required="required"  value="<?php echo ($price) ?>" >
                    </div>
                  </div> 
                </div>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Amount</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="How much?" id="Brand" name="amount" class="wide" min="0" required="required" >
                    </div>
                  </div> 
                </div>
                <!--<input type="hidden" name="address" value="<?#php echo $row['address'];?>">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Payment made?</label>
                    <div class="col-sm-8">
                      <div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Yes</label><input type="radio" class="col-sm-4 col-form-label" name="option" value="1" required="required" >
                      <label for="inputEmail3" class="col-sm-2 col-form-label">No</label><input type="radio" class="col-sm-1 col-form-label" name="option" value="0" required="required" >
                    </div>
                  </div> 
                </div>-->
                
                </div>   
                
                    
                    <input type="hidden" name="username" value="<?php echo $_SESSION["name"] ?>">
                  <div class="card-footer">
                         
                          <button type="submit" name="submit" class="btn btn-info" style="width: 100%;">Continue..</button>
                </div>
                            
  </form>
  </div>
</div>
<?php
}
		



		//if($conn->query($sql)){
			//echo "New record has been inserted successfully.";
		//}
		
		}
		$connect->close();

?>