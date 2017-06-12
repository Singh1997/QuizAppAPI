<?php 
$conn = new mysqli('mysql.hostinger.in','u364618033_aman','amansingh','u364618033_quiz');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$response=array();
$temp=array();
$testId=mysqli_real_escape_string($conn,$_POST['testId']);
$StudentRollNo=mysqli_real_escape_string($conn,$_POST['StudentRollNo']);
$Disqualified=1;
$sql="INSERT INTO `quizdisqualified`(`testId`,`StudentRollNo`,`Disqualified`) VALUES ('$testId','$StudentRollNo','$Disqualified')";
$result=$conn->query($sql);
if(isset($result)){
	$temp["Status"]='1';
}
else{
	$temp["Status"]='0';
}
array_push($response,$temp);
echo json_encode($response);
$conn->close();

 ?>
