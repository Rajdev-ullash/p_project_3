<?php include('./connection.php')
?>
<?php

    $data = stripslashes(file_get_contents("php://input"));
    $mydata = json_decode($data,true);
    $student_name=$mydata['student_name'];
    $student_id=$mydata['student_id'];
    $student_email=$mydata['student_email'];
    $student_password=$mydata['student_password'];
    if(!empty($student_name)&&!empty($student_id)&&!empty($student_email)&&!empty($student_password)){
        $sql1="select * from studentRegistration where student_id='$student_id'";
        $sql2="select * from studentRegistration where student_email='$student_email'";
        $sql="INSERT INTO studentRegistration (student_name,student_id, student_email, student_pass) values ('$student_name','$student_id','$student_email','$student_password')";
        $r1=mysqli_query($conn,$sql1);
        $r2=mysqli_query($conn,$sql2);
        if(mysqli_num_rows($r1)>0){
            echo "Student Id is already exist";
        }
        else if(mysqli_num_rows($r2)>0){
            echo "Student email is already exist";
        }
        else if(mysqli_query($conn,$sql)){
            echo 1;
           
        }
      
    }
    else {
        echo "All fields are required";
    }

?>