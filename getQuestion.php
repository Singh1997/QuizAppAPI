<?php
$conn = new mysqli('mysql.hostinger.in','u364618033_aman','amansingh','u364618033_quiz');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$roll=mysqli_real_escape_string($conn,$_POST["rollno"]);
//$roll=1402910025;
$resultvalue = array(); 
$response = array();
$Year=mysqli_real_escape_string($conn,$_POST['Year']);
$Level=mysqli_real_escape_string($conn,$_POST['Level']);
//$Level=Intermediate;
//$Year=3;
$flag=0;
$sql = "Select * from quizdetails where Id not in (SELECT TestId from testscore where StudentRollNo='$roll' UNION SELECT TestId from quizdisqualified where StudentRollNo='$roll')";
$result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    	    while($row = mysqli_fetch_assoc($result)) {
    	if($Year==$row["Year"] && $Level==$row["Level"]){
        $flag=1;
        $resultvalue["Status"]='1';
    	$resultvalue["Id"]= $row["Id"];
    	$resultvalue["QuizName"]= $row["QuizName"];
    	$resultvalue["Maxmarks"]= $row["Maxmarks"];
      $resultvalue["Date"]=$row["Date"];
      array_push($response, $resultvalue);
    }
     
 }
 if($flag==0){
 
    $resultvalue['Status']='0';
    array_push($response, $resultvalue); 
}
 
   }

   echo json_encode($response);
   $conn->close();
   
  ?>