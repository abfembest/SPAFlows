<?php
   include 'db_connect.php';
     
          $sql ="SELECT passport, id
            FROM perfecttouch.staff WHERE surname = '$name'";
        $result = $connect->query($sql);
        if ($result-> num_rows >0) {
          while ($row = $result-> fetch_assoc()) {
            $id = $row["id"];
            echo ("<img src='actions/documents/".$row['passport']."' class='img-circle elevation-2' alt='User Image' style= 'width:70px; height:70px;'>");
           
  }
       
    # code...
   
 
}
//}

  

//}
    $connect->Close();
  //}
  ?>