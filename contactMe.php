            <div id="contact-me" class="contact m992">
                        <div class="contact-box"> 

                            <div class="top-head">
                                <h3 class="ch2">Contact Me</h3>
                                
                                <div class="contact-btn">
                                    <a href="tel:'07521026016'"><i class="icon-phone-square" aria-hidden="true" title="my phone number"></i></a>
                                    <a href="mailto:'vikinterior@hotmail.co.uk"><i class="icon-envelope" aria-hidden="true" title="my email address"></i></a>
                                </div>
                            </div>

                                <div>
                                    <div class="contact-info">
                                    <!-- <?php include 'dbconnect.php';?> -->
                                    <?php include 'emailto.php';?>  
                                        <form class="contact-form" id="contact-form" onsubmit="return validateForm()"  method="post" action="">

                                        <div class="messages">
                                            <div class="error" id="errorMessage" style="display: <?php echo !empty($errorMessage) ? 'block' : 'none'; ?>">
    <?php 
    // Display error messages here
    if (!empty($errorMessage)) {
        echo $errorMessage;
    }
    ?>
</div>
<div id="success-message" style="display: <?php echo !empty($successMessage) ? 'block' : 'none'; ?>">
    <?php 
    // Display success message here
    if (!empty($successMessage)) {
        echo $successMessage;
    }
    ?>
</div>
                                            </div>

                                            <div class="contact-input">
                                                <div class="my-message">
                                                    <p class="answer textbox">leave a message below and I'll get back to you!</p>
                                                    <span class="chat-img">
                                                        <i class="icon-user1" aria-hidden="true"></i>
                                                    </span>
                                                </div>

                                                <div class="form-input" >
                                                    <input type="text" id="first-name" name="first_name" placeholder="First name*">
                                                    <input type="text" id="last-name" name="last_name" placeholder="Last name*">
                                
                                                    <input type="email" id="email" name="email" placeholder="Email address*">
                                                    <input type="text" id="subject" name="subject" placeholder="Subject">

                                                    <textarea id="contact-message" name="message" placeholder="Message*"></textarea>
                                            
                                                    <button class="submit" type="submit"><b>Submit</b></button>
                                                </div>
                                            </div>
                                        </form>    
                                    </div>
                                </div>
                            </div>
                                <div class="bottom-head"></div>
                    </div>

                    <div class="margin">
                            <span class="arrowUp">
                                <a href="#welcome" class="scroll-up" id="scroll-up"></a>
                            </span>
                    </div>
                </div> 