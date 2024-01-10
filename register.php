<?php
ob_start();
// include header.php file
include('func/header1.php');
?>

<?php

/*  include register form  */
include('views/register_form.php')
/*  include register form  */

?>

<?php
// include footer.php file
include('func/footer.php');
?>

<!-- validate script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
  $(document).ready(function() {
    $('#sign-up').validate({
      rules: {
        fullname: {
          required: true
        },
        username: {
          required: true,
          minlength: 3,
          maxlength: 10
        },
        password: {
          required: true,
          minlength: 3
        },
        password_confirmation: {
          required: true,
          equalTo: "#password"
        },
        phone: {
          required: true,
          minlength: 10,
          maxlength: 10
        },
        email: {
          required: true,
          email: true
        },
        city: {
          required: true
        },
        gender: {
          required: true
        }
      },
      messages: {
        fullname: {
          required: "Please enter your full name"
        },
        username: {
          required: "Please enter a username",
          minlength: "Username must be at least 3 characters long",
          maxlength: "Username cannot be longer than 10 characters"
        },
        password: {
          required: "Please enter a password",
          minlength: "Password must be at least 3 characters long"
        },
        password_confirmation: {
          required: "Please confirm your password",
          equalTo: "Passwords do not match"
        },
        phone: {
          required: "Please enter a phone number",
          minlength: "Phone number must be 10 digits long",
          maxlength: "Phone number must be 10 digits long"
        },
        email: {
          required: "Please enter an email address",
          email: "Please enter a valid email address"
        },
        city: {
          required: "Please select your city"
        },
        gender: {
          required: "Please select your gender"
        }
      }
    });
  });
</script>
