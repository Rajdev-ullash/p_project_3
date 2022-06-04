$(document).ready(function() {
    $("#signup").click(function(e) {
        e.preventDefault();
        var student_name = $("#name").val();
        var student_id = $("#student_id").val();
        var student_email = $("#email").val();
        var student_password = $("#pass").val();
        console.log(student_name, student_id, student_email, student_password);
        var student_info = { student_name: student_name, student_id: student_id, student_email: student_email, student_password: student_password };
        $.ajax({
            url: "registration.php",
            method: "POST",
            data: JSON.stringify(student_info),
            success: function(data) {
                if (data == 1) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success("Successfully registered");

                    setTimeout(function() {
                        location.reload();
                    }, 5000);
                } else {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.error(data);

                }

            }
        })

    })


})