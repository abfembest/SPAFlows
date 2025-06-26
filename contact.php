<?php
$name= filter_input(INPUT_POST, 'name');
$email= filter_input(INPUT_POST, 'email');
$message= filter_input(INPUT_POST, 'message');
$subject= filter_input(INPUT_POST, 'subject');
if(isset($_POST['submit'])){
      
            $to = "jobukabray@gmail.com";
            $subject = "Customer request";
            $body ="Name :".$name. "
                    Subject :".$subject. "
                    E:mail :".$email. " 
                    Body :".$message."

                  jobukng.com/login.php";
            $header = "From: perfecttouchng.com";
            if(mail($to, $subject, $body, $header)) {
               echo '<script type="text/javascript">'; 
               echo 'alert("Request sent, click ok to continue.");'; 
               echo 'window.location.href = "index.html"';
               echo '</script>';
           } else {
               echo '<script type="text/javascript">'; 
               echo 'alert("Network error try again later");'; 
               echo 'window.location.href = "index.html"';
               echo '</script>';
              
           }
        
          } 
 
?>
