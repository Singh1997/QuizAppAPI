 <?php
 $conn = new mysqli('mysql.hostinger.in','u364618033_aman','amansingh','u364618033_quiz');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$response=array();
$temp=array();
$Email=mysqli_real_escape_string($conn,$_POST['Email']);
$Status=mysqli_real_escape_string($conn,$_POST['Status']);
  $Password=mysqli_real_escape_string($conn,$_POST['Password']);
 $sql1 = "UPDATE `studentdetails` SET `Password`='$Password' WHERE `Email`='$Email'";
         $r=$conn->query($sql1);
         if(isset($r) && $Status==1){
         	$temp['Status']='1';
         }
         else
         {
         	$temp['Status']='0';
         }
array_push($response, $temp);
echo json_encode($response);
       ?>