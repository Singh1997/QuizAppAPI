<?php
$conn = new mysqli('mysql.hostinger.in','u364618033_aman','amansingh','u364618033_quiz');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$response=array();
$temp=array();
$StudentRollNo=mysqli_real_escape_string($conn,$_POST['StudentRollNo']);
$sql="UPDATE studentdetails s INNER JOIN(SELECT StudentRollNo, SUM(Score) AS sumscore,  SUM(Badge) AS sumbadge, SUM(QuizComplete) AS sumquizcomplete FROM testscore WHERE StudentRollNo='$StudentRollNo' GROUP BY StudentRollNo ) q ON s.StudentRollNo=q.StudentRollNo SET s.Score=q.sumscore,s.Badge=q.sumbadge,s.QuizCompleted=q.sumquizcomplete";
$result = mysqli_query($conn, $sql);
if(isset($result)){
	$sql1 ="SELECT * FROM  studentdetails  WHERE StudentRollNo='$StudentRollNo'";  
  $result1 = $conn->query($sql1);
 $check=mysqli_fetch_array($result1);
if(isset($check))
{
       $temp["Status"]="1";
       $temp["Level"]=$check["Level"];
        $temp["Badge"]=$check["Badge"];
        $temp["QuizCompleted"]=$check["QuizCompleted"];
 $temp["Score"]=$check["Score"]; 
      array_push($response,$temp);
       
}
else{     
      $temp["Status"]="0";
      array_push($response,$temp);
}
}
    	    echo json_encode($response);
    	    	$conn->close();
    	    
?>  