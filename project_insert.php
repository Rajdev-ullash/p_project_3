<?php
include('./connection.php');
?>
<?php
session_start();

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$project_name=$mydata['project_name'];
$project_details=$mydata['project_details'];
$project_group_name=$mydata['project_group_name'];
$student1=$mydata['student1'];
$student2=$mydata['student2'];
$student3=$mydata['student3'];
$user_id=$_SESSION['user_id'];
// echo gettype($user);

$status ='Pending';
if(!empty($project_name) && !empty($project_details) && !empty($project_group_name)  && !empty($student1) && !empty($student2) && !empty($student3)){
    // $sql1="select * from projectDetails where project_name='$project_name'";
    // $sql2="select * from projectDetails where project_group_name='$project_group_name'";
    // $sql3="select * from projectDetails where student1='$student1'";
    // $sql4="select * from projectDetails where student2='$student2'";

    // $sql5="select * from projectDetails where student3='$student3'";
    // $sql6="select * from projectDetails where student4='$user_id'";
    $sql="INSERT INTO projectDetails(project_name,project_details,project_group_name,student1,student2,student3,student4,status_approval) values ('$project_name','$project_details','$project_group_name','$student1','$student2','$student3','$user_id','$status')";
    // $r1=mysqli_query($conn, $sql1);
    // $r2=mysqli_query($conn, $sql2);
    // $r3=mysqli_query($conn, $sql3);
    // $r4=mysqli_query($conn, $sql4);
    // $r5=mysqli_query($conn, $sql5);
    // $r6=mysqli_query($conn, $sql6);


  //   if (mysqli_num_rows($r1) > 0) {
	// 	echo "Project Name is already exist";
		
	// }
  //   else if (mysqli_num_rows($r2) > 0) {
	// 	echo "Project Group Name is already exist";
		
	// }
  //   else if (mysqli_num_rows($r3) > 0) {
	// 	echo "Student1 is already in a group";
		
	// }
  //   else if (mysqli_num_rows($r4) > 0) {
	// 	echo "Student2 is already in a group";
		
	// }
  //   else if (mysqli_num_rows($r5) > 0) {
	// 	echo "Student3 is already in a group";
		
	// }
  //   else if (mysqli_num_rows($r6) > 0) {
	// 	echo "You are already in a group";
		
	// }
   if(mysqli_query($conn,$sql)){
      echo 1;
  }
  else {
    echo "failed to delete error!" . mysqli_error($conn);
}
}
?>