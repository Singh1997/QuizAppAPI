<?php
$conn = new mysqli('mysql.hostinger.in','u364618033_aman','amansingh','u364618033_quiz');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$response=array();
$temp=array();
$flag=0;
$temp["Status"]="0";
$test_id=mysqli_real_escape_string($conn,$_POST['test_id']);
$sql="SELECT * FROM questions WHERE QuizNameId='$test_id'";
$result=$conn->query($sql);
if(isset($result)){
	while ($row = mysqli_fetch_assoc($result)) {
		if($test_id=$row['QuizNameId']){
		$flag=1;
			$temp["Status"]="1";
			$temp["Question"]=$row['Question'];
			$temp["Option1"]=$row['Option1'];
			$temp["Option2"]=$row['Option2'];
			$temp["Option3"]=$row['Option3'];
			$temp["Option4"]=$row['Option4'];
			$temp["Answer"]=$row['Answer'];
			array_push($response, $temp);
		}
		
	}


}
if($flag==0){
			$temp["Status"]="0";
			array_push($response, $temp);
			}
		
echo json_encode($response);
$conn->close();
  ?>