<?php
$conn = new mysqli('mysql.hostinger.in','u364618033_aman','amansingh','u364618033_quiz');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $response=array();
$StudentRollNo=mysqli_real_escape_string($conn,$_POST['StudentRollNo']);
$Password=mysqli_real_escape_string($conn,$_POST['Password']);

  $sql ="SELECT * FROM  studentdetails  WHERE StudentRollNo='$StudentRollNo' AND Password='$Password' LIMIT 0 , 30";  
  $result = $conn->query($sql);
 $check=mysqli_fetch_array($result);
if(isset($check))
{
        $temp=array();
       $temp["error"]="False";
       $temp["Name"]=$check["Name"];
       $temp["Sec"]=$check["Sec"];
       $temp["Year"]=$check["Year"];
       $temp["Level"]=$check["Level"];
        $temp["Badge"]=$check["Badge"];
        $temp["QuizCompleted"]=$check["QuizCompleted"];
 $temp["Score"]=$check["Score"]; 
      array_push($response,$temp);
       
}
else{
      $temp=array();
      $temp["error"]="True";
      array_push($response,$temp);
}
echo json_encode($response);
$conn->close();
?>
  