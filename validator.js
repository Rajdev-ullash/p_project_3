$(function () {
  var $registrationForm = $("#register");

  $registrationForm.validate({
    rules: {
      name: {
        required: true,
      },
    },
    message: {
      name: {
        required: "Name is required",
      },
    },
  });
});
