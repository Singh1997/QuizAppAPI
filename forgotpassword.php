<?php
$conn = new mysqli('mysql.hostinger.in','u364618033_aman','amansingh','u364618033_quiz');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$Email=mysqli_real_escape_string($conn,$_POST['Email']);
$sql="SELECT * FROM `studentdetails` WHERE `Email`='$Email' ";
$result=$conn->query($sql);
$check=mysqli_fetch_array($result);
if(isset($check)){
	$Password=$check['Password'];
$StudentRollNo=$check['StudentRollNo'];
$Name=$check['Name'];
 $to=$Email;
 $subject='Forgot Password?';
 $message="<!DOCTYPE html>
 <html>
 <body style='margin-top: 0px; margin-left: 0px;margin-right: 0px; '>
 <div  style='background-color: #479FF1; width: 100%;height: 40px; text-align: center; margin-top: 0%;'>
   <img src='http://csquizz.esy.es/Img/ic_launcher-web.png' style='width: 50px;height: 50px;float: left;margin-left: 20px;'> 
 </div>
 <br>
<div>
   <h1 style='color:#76014B;'>Hello,$Name</h2>
   <p style='color:#000000; '>The Password of your account for Your RollNo.$StudentRollNo is </p>
   </div>
  <h5 style='text-align: center;color:#ffffff;font-size: 24px;border-radius: 7px;background-color:#76014B;box-shadow: 3px 3px 1px grey;' >$Password</h5>
   <hr>
   <footer>
      <p style='text-align: center;'>For Any Query Email Us on <b>csequizkiet@gmail.com</b></p>
   </footer>
 </body>
 </html>
 ";
 $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
   $headers .= "From:csequizkiet@gmail.com \r\n";
mail($to,$subject,$message,$headers);
}
$conn->close();
?>