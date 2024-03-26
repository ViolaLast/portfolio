

//==================================================Side menu on click======================================================//
$(document).ready(function() {
    $('#toggleBtn').on('click', function() {
        $('header').toggle();
        
    });
});

// $(".initials-wrap").on("click", () => {
//     if($(".hidden-header").hasClass("active"))
//       $(".hidden-header").removeClass("active");
//     else
//       $(".hidden-header").addClass("active");
//   });

//========================================================Form validation===========================================================//
function validateForm() {
    var firstName = document.getElementById('first-name').value;
    var lastName = document.getElementById('last-name').value;
    var email = document.getElementById('email').value;
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('contact-message').value;
    var errorMessage = document.getElementById('errorMessage');

    // Reset previous error messages and hide the error div
    errorMessage.innerHTML = '';
    errorMessage.style.display = 'none';

    // Check if required fields are empty
    if (firstName.trim() === '') {
        errorMessage.innerHTML += '<div class="error-message">First Name is required.</div>';
    }
    if (lastName.trim() === '') {
        errorMessage.innerHTML += '<div class="error-message">Last Name is required.</div>';
    }
    if (email.trim() === '') {
        errorMessage.innerHTML += '<div class="error-message">Email is required.</div>';
    }
    if (message.trim() === '') {
        errorMessage.innerHTML += '<div class="error-message">Message is required.</div>';
    }

    // Validate email using regex
    var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!emailRegex.test(email)) {
        errorMessage.innerHTML += '<div class="error-message">Please enter a valid email address.</div>';
    }

    // If there are error messages, display the error div
    if (errorMessage.innerHTML !== '') {
        errorMessage.style.display = 'block';
        return false;
    }

    // Form submitted successfully
    return true;
}

//=====================================================================Typing Effect

const dynamicText = document.querySelector(".dynamic-txts li span");
const words = ["Violeta Last", "Creative", "Designer", "Developer"];

let wordIndex = 0;
let charIndex = 1;
let isDeleting = false;

const typeEffect = () => {
    const currentWord = words[wordIndex];
    const currentChar = currentWord.substring(0, charIndex);
    dynamicText.textContent = currentChar;
    dynamicText.classList.add("stop-blinking");

    if (!isDeleting && charIndex < currentWord.length) {
        // If condition is true, type the next character
        charIndex++;
        setTimeout(typeEffect, 200);

    } else if (isDeleting && charIndex > 0) {
        charIndex--;
        setTimeout(typeEffect, 100);

    } else {
        isDeleting = !isDeleting;
        dynamicText.classList.remove("stop-blinking");
        wordIndex = !isDeleting ? (wordIndex + 1) % words.length : wordIndex;
        setTimeout(typeEffect, 1200);
    }
}

document.addEventListener("DOMContentLoaded", typeEffect);

//=========================================================================================================================================================

document.addEventListener('DOMContentLoaded', function() {
    // Clear form fields
    document.getElementById('contact-form').reset();
    
    // Check if there is a success message in the session
    const successMessage = "<?php echo isset($_SESSION['success']) && $_SESSION['success'] ? 'true' : 'false'; ?>";
    if (successMessage === 'true') {
        // Display success message
        // For example, you can show an alert
        alert('Form submitted successfully!');
        // Clear the session variable
        <?php unset($_SESSION['success']); ?>
    }
});
    