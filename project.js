function projectTitle() {
  var project_name = $("#project-name").val();
  console.log(project_name);
  var datas = { project_name: project_name };
  console.log(datas);
  $.ajax({
    url: "project_title_check.php",
    method: "POST",
    data: JSON.stringify(datas),

    success: function (data) {
      console.log(data);
      //   "#check_email".html(data);
      //   console.log(data);

      $("#project_title_checked").html(data);

      //   document.getElementById("checkEmail").html(data);
    },
    error: function () {},
  });
}

function groupName() {
  var project_group_name = $("#group-name").val();
  console.log(project_name);
  var datas = { project_group_name: project_group_name };
  console.log(datas);
  $.ajax({
    url: "project_group_check.php",
    method: "POST",
    data: JSON.stringify(datas),

    success: function (data) {
      console.log(data);
      //   "#check_email".html(data);
      //   console.log(data);

      $("#project_group_checked").html(data);

      //   document.getElementById("checkEmail").html(data);
    },
    error: function () {},
  });
}

function group_member_checked() {
  var idArr = $.map($('input[type=text][name="id[]"]'), function (el) {
    return el.value;
  });
  console.log(idArr.length);
  if (idArr.length == 1) {
    var student1 = idArr[0];
    var student2 = "empty";
    var student3 = "empty";

    var group_project_info = {
      student1: student1,
      student2: student2,
      student3: student3,
    };
    console.log(group_project_info);
  } else if (idArr.length == 2) {
    var student1 = idArr[0];
    var student2 = idArr[1];
    var student3 = "empty";

    var group_project_info = {
      student1: student1,
      student2: student2,
      student3: student3,
    };
  } else if (idArr.length == 3) {
    var student1 = idArr[0];
    var student2 = idArr[1];
    var student3 = idArr[2];

    var group_project_info = {
      student1: student1,
      student2: student2,
      student3: student3,
    };
  }

  $.ajax({
    url: "project_group_member_check.php",
    method: "POST",
    data: JSON.stringify(group_project_info),

    success: function (data) {
      console.log(data);
      //   "#check_email".html(data);
      //   console.log(data);

      $("#project_member_checked").html(data);

      //   document.getElementById("checkEmail").html(data);
    },
    error: function () {},
  });
}

function showdata() {
  output = "";
  $.ajax({
    url: "show_project.php",
    method: "GET",
    dataType: "json",
    success: function (data) {
      // console.log(data);
      if (data) {
        x = data;
      } else {
        x = "";
      }
      for (i = 0; i < x.length; i++) {
        output +=
          "<tr class='text-center'><td>" +
          x[i].id +
          "</td><td>" +
          x[i].project_name +
          "</td><td>" +
          x[i].project_details +
          "</td><td>" +
          x[i].project_group_name +
          "</td><td>" +
          x[i].student1 +
          "</td><td>" +
          x[i].student2 +
          "</td><td>" +
          x[i].student3 +
          "</td><td>" +
          x[i].student4 +
          "</td><td class='badge bg-primary mt-3'>" +
          x[i].status_approval +
          "</td><td> <button class='btn btn-warning btn-sm m-2 btn-edit' data-sid=" +
          x[i].id +
          " data-bs-toggle='modal'data-bs-target='#exampleModal2'>Edit</button><button class='btn btn-danger btn-sm btn-del' data-sid=" +
          x[i].id +
          ">Delete</button></td></tr>";
      }

      $("#tbody").html(output);
    },
  });
}
showdata();

$(document).ready(function () {
  $("#add_project").click(function (e) {
    console.log("Submit Button Clicked");
    e.preventDefault();
    var project_name = $("#project-name").val();
    var project_details = $("#details").val();
    var project_group_name = $("#group-name").val();

    var idArr = $.map($('input[type=text][name="id[]"]'), function (el) {
      return el.value;
    });
    console.log(idArr.length);
    if (idArr.length == 1) {
      var student1 = idArr[0];
      var student2 = "empty";
      var student3 = "empty";

      var group_project_info = {
        project_name: project_name,
        project_details: project_details,
        project_group_name: project_group_name,
        student1: student1,
        student2: student2,
        student3: student3,
      };
      console.log(group_project_info);
      $.ajax({
        url: "project_insert.php",
        method: "POST",
        data: JSON.stringify(group_project_info),
        success: function (data) {
          console.log(data);
          showdata();
          if (data == 1) {
            alertify.set("notifier", "position", "top-right");
            alertify.success("Successfully Inserted");
            $("#exampleModal").modal("hide");
            $("#myform")[0].reset();
            showdata();
          } else {
            alertify.set("notifier", "position", "top-right");
            alertify.error(data);
          }
        },
      });
    } else if (idArr.length == 2) {
      var student1 = idArr[0];
      var student2 = idArr[1];
      var student3 = "empty";

      var group_project_info = {
        project_name: project_name,
        project_details: project_details,
        project_group_name: project_group_name,
        student1: student1,
        student2: student2,
        student3: student3,
      };
      $.ajax({
        url: "project_insert.php",
        method: "POST",
        data: JSON.stringify(group_project_info),
        success: function (data) {
          console.log(data);

          if (data == 1) {
            alertify.set("notifier", "position", "top-right");
            alertify.success("Successfully Inserted");
            $("#exampleModal").modal("hide");
            $("#myform")[0].reset();
            showdata();
          } else {
            alertify.set("notifier", "position", "top-right");
            alertify.error(data);
          }
        },
      });
    } else if (idArr.length == 3) {
      var student1 = idArr[0];
      var student2 = idArr[1];
      var student3 = idArr[2];

      var group_project_info = {
        project_name: project_name,
        project_details: project_details,
        project_group_name: project_group_name,
        student1: student1,
        student2: student2,
        student3: student3,
      };
      $.ajax({
        url: "project_insert.php",
        method: "POST",
        data: JSON.stringify(group_project_info),
        success: function (data) {
          console.log(data);

          if (data == 1) {
            alertify.set("notifier", "position", "top-right");
            alertify.success("Successfully Inserted");
            $("#exampleModal").modal("hide");
            $("#myform")[0].reset();
            showdata();
          } else {
            alertify.set("notifier", "position", "top-right");
            alertify.error(data);
          }
        },
      });
    }

    // var project_id=idArr.values();
    // for(var value of project_id){
    //     console.log(value.);
    // }
    // console.log(project_id);
  });

  $("tbody").on("click", ".btn-del", function () {
    console.log("Delete Button Clicked");
    let id = $(this).attr("data-sid");
    // console.log(id);
    mydata = { sid: id };
    mythis = this;
    $.ajax({
      url: "delete_project.php",
      method: "POST",
      data: JSON.stringify(mydata),
      success: function (data) {
        // console.log(data);
        if (data == 1) {
          alertify.set("notifier", "position", "top-right");
          alertify.success("Session deleted successfully");
          $(mythis).closest("tr").fadeOut();
        } else if (data == 0) {
          alertify.set("notifier", "position", "top-right");
          alertify.success("Project not deleted");
        }
        showdata();
      },
    });
  });

  $("tbody").on("click", ".btn-edit", function () {
    console.log(" session edit Button Clicked");
    var id = $(this).attr("data-sid");
    console.log(id);
    // console.log(id);
    mydata = { sid: id };
    $.ajax({
      url: "edit_project.php",
      method: "POST",
      dataType: "json",
      data: JSON.stringify(mydata),
      success: function (data) {
        console.log(data);
        $("#project_name").val(data.project_name);
        $("#project_details").val(data.project_details);
        $("#group_name").val(data.project_group_name);
        $("#member_one").val(data.student1);
        $("#member_two").val(data.student2);
        $("#member_three").val(data.student3);
      },
    });

    //update section
    $("#update_project").click(function (e) {
      e.preventDefault();
      console.log("update");

      console.log(id);
      var project_name = $("#project_name").val();
      var project_details = $("#project_details").val();
      var group_name = $("#group_name").val();
      var member_one = $("#member_one").val();
      var member_two = $("#member_two").val();
      var member_three = $("#member_three").val();

      //   console.log(session_name);

      var session_data = {
        sid: id,
        project_name: project_name,
        project_details: project_details,
        group_name: group_name,
        member_one: member_one,
        member_two: member_two,
        member_three: member_three,
      };
      $.ajax({
        url: "edit_project_insert.php",
        method: "POST",
        data: JSON.stringify(session_data),
        success: function (data) {
          console.log(data);
          //   showdata();
          if (data == 1) {
            $("#exampleModal2").modal("hide");
            alertify.set("notifier", "position", "top-right");
            alertify.success("Project updated successfully");
            // $("#myform2")[0].reset();
            showdata();
          } else {
            alertify.set("notifier", "position", "top-right");
            alertify.success(data);
          }
        },
      });
    });
  });
});
