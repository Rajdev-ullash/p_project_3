
<?php
session_start();
$id= $_SESSION['user_id'];

if ($_SESSION['student_login_status'] != "logged in" and !isset($_SESSION['user_id']))
    header('Location:./sign.php');



if (isset($_GET['sign']) and $_GET['sign'] == "out") {
    $_SESSION['admin_login_status'] = "logged out";
    unset($_SESSION['user_id']);
    header('Location:./sign.php');
}
?> 
<?php include 'connection.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learn Ajax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>



</head>
<body>
  <?php include './navbar.php' ?>
    
<div class="container mt-5">
      <div class="row">
        <div class="col-md-12 ">
          <button
            class="btn btn-primary mb-3"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Add Project Idea
          </button>

          <!-- Modal -->
          <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Submit your Project idea</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                <form action="">
                    <div class="form-group">
                    <label for="">Project Title</label>
                        
                        <input type="text" class="form-control" name="project-name" id="project-name" onInput="projectTitle()" required>
                        <span id="project_title_checked"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Project Details</label>
                        <input type="text" class="form-control" name="details" id="details" required>
                    </div>
                    <div class="form-group">
                        <label for="">Group Name</label>
                        <input type="text" class="form-control" name="group-name" id="group-name" onInput="groupName()" required>
                        <span id="project_group_checked"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Select Group Members</label>
                        <select name="total_members" id="total_members" class="form-control">
                            <option value="">SELECT No of Members</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>

                    </div>
                    <div id="members">

                    </div>
                    <span id="project_member_checked"></span>
                </form>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                  >
                    Close
                  </button>
                  <!-- <div id="button_save"></div> -->
                  <button name="submit" class="btn btn-primary" id="add_project">Submit</button>
                </div>
              </div>
            </div>
          </div>
          <!--Bootstrap Table-->
          <div class="">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Project Title</th>
                  <th scope="col">Project Description</th>
                  <th scope="col">Group Name</th>
                  <th scope="col">Member one Id</th>
                  <th scope="col">Member two Id</th>
                  <th scope="col">Member three Id</th>
                  <th scope="col">Group Leader Id</th>
                  <th scope="col">Approval</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="tbody"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="exampleModal2"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Project</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
                <form action="">
                    <div class="form-group">
                    <label for="">Project Title</label>
                        <input type="text" class="form-control" name="project-name" id="project_name">
                        <!-- <span id="update_project_title_checked"></span> -->
                    </div>
                    <div class="form-group">
                        <label for="">Project Details</label>
                        <input type="text" class="form-control" name="details" id="project_details">
                    </div>
                    <div class="form-group">
                        <label for="">Group Name</label>
                        <input type="text" class="form-control" name="group-name" id="group_name">
                    </div>
                    <div class="form-group">
                        <label for="">Member one Id</label>
                        <input type="text" placeholder="Enter Student ID" class="form-control" name="" id="member_one">
                    </div>
                    <div class="form-group">
                        <label for="">Member two Id</label>
                        <input type="text" placeholder="Enter Student ID" class="form-control" name="" id="member_two">
                    </div>
                    <div class="form-group">
                        <label for="">Member three Id</label>
                        <input type="text" placeholder="Enter Student ID" class="form-control" name="" id="member_three">
                    </div>
                    
                    
                </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary" id="update_project">
              Save
            </button>
          </div>
        </div>
      </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="./project.js"></script>
    <script>
        $(document).ready(function() {

            $("#total_members").change(function() {
                $("#members").empty()
                var total_members = $(this).val();
                // console.log(total_members);
                for (var i=0; i<total_members; i++) {
                    var str = `
                                    <div class="form-group mt-2">
                                        <input type="text" placeholder="Enter Student ID" class="form-control" name="id[]" id="" onInput="group_member_checked()">
                                    </div>
                                    
                               `;
                                $("#members").append(str);
                }

                // var btn = '<button type="submit" name="submit" class="btn btn-primary " id="add_project">Submit</button>';
               

                // $("#button_save").append(btn);
            })
            
        })
    </script>
    <!-- <script src="./project.js"></script> -->
    
</body>
</html>

