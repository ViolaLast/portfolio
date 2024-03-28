

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
$(document).ready(function() {
    // Add event listeners for input fields
    $("#first-name, #last-name, #email, #message").on("input", function() {
        validateInput($(this));
    });

    // Function to validate input fields
    function validateInput(input) {
        // Remove error border initially
        input.removeClass("error-border");

        // Perform validation based on input field ID
        switch (input.attr("id")) {
            case "first-name":
            case "last-name":
                if (!input.val().trim()) {
                    input.addClass("error-border");
                }
                break;
            case "email":
                if (!isValidEmailAddress(input.val().trim())) {
                    input.addClass("error-border");
                }
                break;
            case "message":
                if (!input.val().trim()) {
                    input.addClass("error-border");
                }
                break;
        }
    }

    // Function to validate email format
    function isValidEmailAddress(email) {
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailRegex.test(email);
    }
});


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
    