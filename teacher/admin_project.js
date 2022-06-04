function showdata() {
  output = "";
  $.ajax({
    url: "show_all_project_admin.php",
    method: "GET",
    dataType: "json",
    success: function (data) {
      console.log(data);
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
          "</td><td> <button class='btn btn-warning btn-sm m-2 btn-accept' data-sid=" +
          x[i].id +
          " data-bs-toggle='modal'data-bs-target='#exampleModal2'>Accept</button><button class='btn btn-danger btn-sm btn-reject' data-sid=" +
          x[i].id +
          ">Reject</button></td></tr>";
      }

      $("#tbody").html(output);
    },
  });
}
showdata();

$(document).ready(function () {
  $("tbody").on("click", ".btn-accept", function () {
    console.log(" session edit Button Clicked");
    var id = $(this).attr("data-sid");
    console.log(id);
    // console.log(id);
    mydata = { sid: id };
    $.ajax({
      url: "edit_admin_project.php",
      method: "POST",
      data: JSON.stringify(mydata),
      success: function (data) {
        console.log(data);
        if (data == 1) {
          alertify.set("notifier", "position", "top-right");
          alertify.success("Project Status updated successfully");
          // $("#myform2")[0].reset();
          showdata();
        } else {
          alertify.set("notifier", "position", "top-right");
          alertify.success(data);
        }
      },
    });
  });
  $("tbody").on("click", ".btn-reject", function () {
    console.log(" session edit Button Clicked");
    var id = $(this).attr("data-sid");
    console.log(id);
    // console.log(id);
    mydata = { sid: id };
    $.ajax({
      url: "reject_admin_project.php",
      method: "POST",
      data: JSON.stringify(mydata),
      success: function (data) {
        console.log(data);
        if (data == 1) {
          alertify.set("notifier", "position", "top-right");
          alertify.success("Project Status updated successfully");
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
