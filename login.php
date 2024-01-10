<?php
ob_start();
// include header.php file
include('func/header1.php');
?>

<?php

/*  include login form  */
include('views/login-form.php')
/*  include login form  */

?>

<?php
// include footer.php file
include('func/footer.php');
?>

<!-- validate script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
  const form = document.querySelector('form');
  const usernameInput = document.getElementById('username');
  const passwordInput = document.getElementById('password');
  
  form.addEventListener('submit', (event) => {
    event.preventDefault();
    
    // Reset any previous error messages
    clearErrors();
    
    // Get input values
    const username = usernameInput.value.trim();
    const password = passwordInput.value.trim();
    
    // Validate inputs
    let isValid = true;
    if (username === '') {
      showError(usernameInput, 'Username is required');
      isValid = false;
    } else if (username.length < 3) {
      showError(usernameInput, 'Username must be at least 3 characters');
      isValid = false;
    } else if (username.length > 10) {
      showError(usernameInput, 'Username cannot be more than 10 characters');
      isValid = false;
    }
    
    if (password === '') {
      showError(passwordInput, 'Password is required');
      isValid = false;
    } else if (password.length < 3) {
      showError(passwordInput, 'Password must be at least 3 characters');
      isValid = false;
    }
    
    // Submit the form if all inputs are valid
    if (isValid) {
      form.submit();
    }
  });
  
  function showError(input, message) {
    const formGroup = input.parentElement;
    const errorMessage = formGroup.querySelector('.form-message');
    formGroup.classList.add('error');
    errorMessage.innerText = message;
  }
  
  function clearErrors() {
    const formGroups = document.querySelectorAll('.form-group');
    formGroups.forEach(formGroup => {
      formGroup.classList.remove('error');
      const errorMessage = formGroup.querySelector('.form-message');
      errorMessage.innerText = '';
    });
  }
</script>
