<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include("includes/head.php");
    ?>

    <title>Assessment - Contact Us | Netmatters</title>
</head>
<body>
    <?php 
        include("includes/overlay.php");
    ?>

    <div id="MainContentGrid">
        <div id="MainContentContainer">
            <div class="maincontent-inner">
                <?php 
                    include("includes/header.php");
                ?>
    
                <div id="Content">
                    <main>
                        <div class="contact-banner">
                            <div class="contact-banner-primary">
                                <a href="index.php">Home</a>
                                <p> / Our Offices</p>
                            </div>
                            
                            <div class="contact-banner-secondary">
                                <h1>Our Offices</h1>
                            </div>
                        </div>

                        <div id="Offices">
                            <div class="office">
                            <img class="header-title" src="Images/nm-logo-black.webp" alt="Netmatters Logo">
                            <p class="office-name">
                                <a href="">London Office</a>
                            </p>
                            <p class="office-details">
                                Unit G6
                                <br>
                                Pixel Business Centre,
                                <br>
                                110 Brooker Road, Waltham Abbey,
                                <br>
                                London,
                                <br>
                                EN9 1JH
                            </p>
                            <p class="office-phone">
                                <a href="">London Office</a>
                            </p>
                            <a class="btn">VIEW MORE</a>
                            </div>
                        </div>
                    </main>

                    <aside>
                        <div class="contact-details">
                            <p>Email us on:</p>

                            <p>
                                <a href="">sales@netmatters.com</a>
                            </p>

                            <p>Business hours:</p>

                            <p>Monday - Friday 07:00 - 18:00</p>

                            <div class="dropdown">
                                <div class="dropdown-btn">
                                    <p>Out of Hours IT Support</p>
                                    <!-- TODO: Add arrow down after IT support -->
                                </div>

                                <div class="dropdown-info dropdown-hide">
                                    <p>Netmatters IT are offering an Out of Hours service for Emergency and Critical tasks.</p>

                                    <p>
                                        <strong>Monday - Friday 18:00 - 22:00 Saturday 08:00 - 16:00 Sunday 10:00 - 18:00</strong>
                                    </p>

                                    <p>To log a critical task, you will need to call our main line number and select Option 2 to leave an Out of Hours  voicemail. A technician will contact you on the number provided within 45 minutes of your call.</p>
                                </div>
                            </div>
                        </div>

                        <div id="Contact">
                            <div class="section">
                                <form action="index.html" method="post">
                                    <fieldset class="flex-container vertical form">
                                        <div class="grid-container">
                                            <!-- Your Name -->
                                            <div class="flex-item">
                                                <label for="name" class="required">Your Name</label>
                                                <br>
                                                <input type="text" id="name" name="user_name">
                                            </div>

                                            <!-- Company Name -->
                                            <div class="flex-item">
                                                <label for="company-name">Company Name</label>
                                                <br>
                                                <input type="text" id="company-name" name="company_name">
                                            </div>
    
                                            <!-- Your Email -->
                                            <div class="flex-item">
                                                <label for="email" class="required">Your Email</label>
                                                <br>
                                                <input type="email" id="email" name="user_email">
                                            </div>

                                            <!-- Your Telephone Number -->
                                            <div class="flex-item">
                                                <label for="phone-number" class="required">Your Telephone Number</label>
                                                <br>
                                                <input type="tel" id="phone-number" name="user_phone_number">
                                            </div>

                                            <!-- Message -->
                                            <div class="flex-item">
                                                <label for="message" class="required">Message</label>
                                                <br>
                                                <input type="text" id="message" name="user_message">
                                            </div>
                                        </div>
    
                                        <div class="flex-item">
                                            <input class="checkbox-item checkbox-hide" type="checkbox">
                                            <div class="checkbox-field">
                                                <div class="checkbox-item checkbox-custom">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
                                                        <title></title>
                                                        <g id="icomoon-ignore">
                                                        </g>
                                                        <path d="M432 64l-240 240-112-112-80 80 192 192 320-320z"></path>
                                                    </svg>
                                                </div>
                                                <p class="checkbox-item">Please tick this box if you wish to receive marketing information from us. Please see our <a href="#">Privacy Policy</a> for more information on how we keep your data safe.</p>
                                            </div>
                                        </div>
    
                                        <div class="flex-item">
                                            <p>
                                                <small>This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</small>
                                            </p>
                                        </div>

                                        <div class="flex-item">
                                            <div class="flex-container space-between">
                                                <div class="flex-item">
                                                    <button class="btn-subscribe">Send Enquiry</button>
                                                </div>

                                                <div class="flex-item">
                                                    <p class="required-info">Fields Required</p>
                                                </div>
                                            </div>
                                        </div>
                        
                                    </fieldset>
                                </form>
                            </div>
                        </div>

                        <?php 
                            include("includes/emailsignup.php");
                        ?>
                    </aside>
                </div>
    
                <?php 
                    include("includes/footer.php");
                ?>
            </div>
        </div>

        <?php 
            include("includes/sidepanel.php");
        ?>
        
    </div>

    <?php 
        include("includes/cookies.php");
    ?>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/plugins/slick/slick.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>