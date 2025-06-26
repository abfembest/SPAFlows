<?php
include 'db_connect.php';
include 'toplinks.php';
//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
	$id = $_GET['id'];

	$sql = "SELECT * FROM perfecttouch.payments WHERE id = '$id'";
			$result = $connect->query($sql);
			if ($result-> num_rows >0) {
          		while ($row = $result-> fetch_assoc()) {
          			$id = $row['id'];
          			$fullname = $row['custname'];
          			$invoice_id = $row['invoice_id'];
          			$paymethod = $row['paymethod'];
          			$unit_price = $row['amount'];
                $type = $row['type'];
          			

          		?>
          

			
			<section class="content">

      <div class="container-fluid" style="max-width: 60%;">

        <div class="row">
          <div class="col-10">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">UPDATE TRANSACTION RECORD</h3>
                  
                
                 
               

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
           
                  <div class="card card-secondary">
                  <div class="card-header">

                <h3 class="card-title btn btn-primary"><a href="updatepaymthd.php"><button class="btn btn-dabger">Back</button></a></h3>

              </div>
				<form class="form-horizontal" action="actions/action_updatepaymthd.php" enctype='multipart/form-data' method="POST">
                <div class="card-body">
                	<input type="hidden" name="id" value="<?php echo $id;?>">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Name </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="fullname" class="wide" min="0" required="required" value="<?php echo $fullname;?>" >
                    </div>
                  </div> 
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Services </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="invoice_id" class="wide" min="0" required="required"  value="<?php echo ($type) ?>" >
                    </div>
                  </div> 
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Invioce ID </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="invoice_id" class="wide" min="0" required="required"  value="<?php echo ($invoice_id) ?>" >
                    </div>
                  </div> 
                </div>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Amount</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="How much?" id="Brand" name="unit_price" class="wide" min="0" required="required" value="<?php echo $unit_price;?>" >
                    </div>
                  </div> 
                </div>
                     <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Payment method</label>
                  <div class="col-sm-8">
                      <div>
                         <SELECT class="form-control" name ="paymethod" required>
                          <option selected></option>
                          <option>cash</option>
                          <option>POS</option>
                          <option>transfer</option>
                          <option>cash and transfer</option>
                        
                          </SELECT>
                    </div>
                  </div> 
                </div>                
                
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