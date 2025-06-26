<?php include 'db_connect.php';
    if(isset($_POST['name'])){
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $sql = "INSERT INTO perfecttouch.ajax (name, date) VALUES('$name',current_timestamp)";
        if(mysqli_query($connect,$sql)){
            echo "Connection successful";
        }
        else
        echo "Unseccessful.";
    }

?>