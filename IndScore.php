<?php  
$conn = new mysqli('mysql.hostinger.in','u364618033_aman','amansingh','u364618033_quiz');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$response=array();
$temp=array();
$flag=0;
$StudentRollNo=mysqli_real_escape_string($conn,$_POST['StudentRollNo']);
//$StudentRollNo=1402910025;
$sql="SELECT * FROM testscore WHERE StudentRollNo='$StudentRollNo'";
$result=$conn->query($sql);
if(mysqli_num_rows($result) > 0){
	while ($check=mysqli_fetch_assoc($result)) {
		if($StudentRollNo==$check['StudentRollNo']){
			$flag=1;
			$temp["Status"]='1';
			$temp["QuizId"]=$check['TestId'];
			$temp["QuizName"]=$check['TestName'];
			$temp["Score"]=$check['Score'];
			$temp["Date"]=$check['Date'];
			array_push($response,$temp);
		}
	}
	
}
if($flag==0){
      $temp["Status"]='0';
      array_push($response,$temp);
	}
echo json_encode($response);
$conn->close();
?>