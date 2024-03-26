<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php';?>

    <body>
    <?php include 'sidebar.php';?>
        
<!--====================================================================================BACKGROUND====================================================================-->       
        <div class="background">

                    <div class="star star1"></div>
                    <div class="star star2"></div>
                    <div class="star star3"></div>
                    <div class="star star4"></div>
                    <div class="star star5"></div>
                    <div class="star star6"></div>
                    <div class="star star7"></div>
                    <div class="star star8"></div>

<!--==============================================================welcome section=============================================================-->   
            
            
            <div class="welcome" id="coding">
                        <div class="text-container">
    
                            <div class="wrapper h360"> 
                                    <div class="static-txt">I'm</div>
                                <ul class="code-txts">
                                    <li><span> Creating </span></li>
                                    <li><span> Learning </span></li>
                                    <li><span> Building </span></li>
                                    <li><span> Progressing </span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>  
        
        <span class="arrowDown">
            <a href="#codingExamples" class="scroll-down"></a>
        </span>
<!--================================================================About me============================================================-->
            <div class="main">
                <div class="container">
                    <div class="code m1200 codingExamples" id="codingExamples">
                        <h2 class="p-h1">JavaScript (Validation)</h2>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

<!-- and it's easy to individually load additional languages -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/go.min.js"></script>

<script>hljs.highlightAll();</script>
                                <div class="">
    
    <pre>
        <code>
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
        </code>
    </pre> 
    <br>
                                        </div>  
                                        
                            <p class="code-txt">
                                The provided JavaScript function, validateForm(), serves a critical role in ensuring the integrity of the contact form on your portfolio website.<br>
                                <br>
                                It verifies that users have entered valid information into the designated fields before permitting form submission. <br>
                                <br>
                                By meticulously checking for errors such as empty required fields and improperly formatted email addresses, the function maintains the quality of the data received.<br>
                                <br>
                                Moreover, it communicates with users by presenting alert messages to notify them of any issues encountered during the form submission process, 
                                offering a seamless and user-friendly experience.<br>
                                <br>
                                This robust validation mechanism underscores your commitment to professionalism and user satisfaction on your portfolio platform.
                            </p>  
                        
                    </div>

                    <div class="code m1200 codingExamples">
                        <h2 class="p-h1">JavaScript (Typing Effect)</h2>

                                <div class="">
        <pre>
            <code>
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

        if (!isDeleting && charIndex <currentWord.length) {
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
            </code>
        </pre> 
                                </div>
    <br>
                            <p class="code-txt">
                                The provided JavaScript code creates an engaging and dynamic text display with a typewriter effect. <br>
                                <br>
                                By cycling through a predefined array of words, it adds a captivating element to my portfolio, 
                                making it more visually appealing and interactive for visitors.<br>
                                <br>
                                The script simulates the typing and deletion of text characters, creating a fluid and continuous animation that grabs users' attention.<br>
                                <br>
                                This dynamic presentation showcases my creativity and technical skills as a developer, 
                                Overall the typewriter effect contributes to a memorable and engaging user experience, enhancing the overall impact of my portfolio.
                            </p>  
                        </div>   
                    
<!--===========================================================================Contact Me=====================================================================-->       
<?php include 'contactMe.php';?>    
                    
<!--============================================================================= footer =============================================================================-->
<?php include 'footer.php';?>  
<?php include 'js.php';?> 

            </div>
    </body>
</html>