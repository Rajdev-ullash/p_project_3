<?php include './connection.php'; ?>

<?php 
session_start();
    $data = stripslashes(file_get_contents("php://input"));
    $mydata = json_decode($data,true);

    $id= $mydata['sid'];
    $project_name= $mydata['project_name'];
    $project_details= $mydata['project_details'];
    $group_name= $mydata['group_name'];
    $member_one= $mydata['member_one'];
    $member_two= $mydata['member_two'];
    $member_three= $mydata['member_three'];

        $sql ="UPDATE projectDetails SET project_name='$project_name',project_details='$project_details',project_group_name='$group_name',student1='$member_one',student2='$member_two',student3='$member_three' WHERE id={$id}";
      
        
        if($conn->query($sql)==TRUE){
            echo 1;
        }
        else{
            echo "Project not updated";  
        }
    
   

?>