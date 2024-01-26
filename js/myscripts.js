

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

    // =============================================Check if required fields are empty
    if (firstName.trim() === '' || lastName.trim() === '' || email.trim() === '' || message.trim() === '') {
        alert('Please fill in all required fields.');
        return;
    }

    //======================================== Validate email using regex
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return;
    }
    alert('Form submitted successfully!');
}
//=====================================================================Typing Effect

