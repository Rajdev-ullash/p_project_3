<?php include './connection.php' ?>

<?php 
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$project_group_name = $mydata['project_group_name'];

$sql = "SELECT * FROM projectDetails where project_group_name = '$project_group_name'";
$result =mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if($count>0){
  echo "<span style='color:red'>Group name is already exist.</span>"; 
}

else{
    echo "<span style='color:green'>Group name is available.</span>";
}

?>