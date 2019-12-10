$(document).ready(function() {
  $("#emailForm").on("submit", function(e) {
    e.preventDefault();

    var email = $("#email").val();

    $.ajax({
      type: "post",
      url: "process_emails.php",
      data: "email=" + email,
      success: function(data) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "thank you for subscribing"
        });

        $("#emailForm")[0].reset();
      },

      error: function(data) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Sorry, something went wrong! kindly try again"
        });
      }
    });
  });
});

// $(document).ready(function vvalidate() {
//   $("#emailForm").validate({
//     rules: {
//       email: {
//         required: true,
//         email: true
//       }
//     },
//     messages: {
//       email: "please enter a valid email address"
//     },
//     submitHandler: function(form) {
//       form.submit();
//     }
//   });
// });
