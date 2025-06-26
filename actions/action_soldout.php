<?php
include 'db_connect.php';
include 'toplinks.php';
//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
	$id = $_GET['id'];

	$sql = "SELECT * FROM olaoluwa.sales WHERE id = '$id'";
			$result = $connect->query($sql);
			if ($result-> num_rows >0) {
          		while ($row = $result-> fetch_assoc()) {
          			$id = $row['id'];
          			$type = $row['type'];
          			$quantity = $row['quantity'];
          			$fullname = $row['fullname'];
          			$phone = $row['phone'];
          			$type = $row['type'];
          			$unit_price = $row['unit_price'];
          			$username = $row['username'];
          			$invoice_id = $row['invoice_id'];
          			$deleted = $row['transaction_date'];
          			$cost= ($unit_price*$quantity);

          		}
          			}
		
		if(mysqli_multi_query($connect, $sql)){?>
			
			<section class="content">

      <div class="container-fluid" style="max-width: 60%;">

        <div class="row">
          <div class="col-10">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="color: red">Sales will be deleted and account will be reconciled.</h3>
                  
                
                 
               

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

                <h3 class="card-title"><a href="../delet.php"><button class="btn btn-secondary">Back</button></a></h3>

              </div>
				<form class="form-horizontal" action="action_refund.php" enctype='multipart/form-data' method="POST">
                <div class="card-body">
                	<input type="hidden" name="id" value="<?php echo $id;?>">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Name </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="fullname" class="wide" min="0" required="required" readonly value="<?php echo $fullname;?>" >
                    </div>
                  </div> 
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Product </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="type" class="wide" min="0" required="required" readonly value="<?php echo ($type) ?>" >
                    </div>
                  </div> 
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Phone </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="phone" class="wide" min="0" required="required" readonly value="<?php echo ($phone) ?>" >
                    </div>
                  </div> 
                </div>
                        <input type="hidden" step="any" name="quantity" value="<?php echo $quantity ?>">
                        <input type="hidden" name="invoice_id" value="<?php echo $invoice_id ?>">
                        <input type="hidden" step="any" name="unit_price" value="<?php echo $unit_price ?>">
                        <input type="hidden" name="transaction_date" value="<?php echo $deleted ?>">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Amount</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="How many units?" step = "any" id="Brand" name="apaid" class="wide" min="0" required="required" value="<?php echo $cost;?>" >
                    </div>
                  </div> 
                </div>
                <input type="hidden" name="address" value="<?php echo $row['address'];?>">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Payment made?</label>
                    <div class="col-sm-8">
                      <div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Yes</label><input type="radio" class="col-sm-4 col-form-label" name="option" value="1" required="required" >
                      <label for="inputEmail3" class="col-sm-2 col-form-label">No</label><input type="radio" class="col-sm-1 col-form-label" name="option" value="0" required="required" >
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
		else{
			echo "Error: ".$sql."<br>".$connect->error;
		}
		$connect->close();

?>