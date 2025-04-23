<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACA Inbounds - $1200 $1400 Monthly Subsidies</title>
    <link rel="stylesheet" href="/assist/css/6400-health-tax-credit.css">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WV3MMCF5');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WV3MMCF5"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <section class="top-bar">
        <div class="top-bar-main container">
            <p>$6400 Health Subsidy</p>
        </div>
    </section>
    <section class="hero-section">
        <div class="hero container">
            <div class="hero-text">
                <h1>A <span style="color: #E5F45A;">$6,400</span> subsidy is now available for qualifying Americans to assist with medical bills, rent, utilities, groceries, and financial relief for everyday essentials.</h1>
            </div>
            <div class="hero-img">
                <img src="/images/hero-image-5.webp" alt="Credit Card">
                <h2>Americans earning under $50,000 annually and without Medicare or Medicaid may qualify for $6,400 in health benefits to cover essential medical expenses and care.</h2>
            </div>
            <div class="form-wraper" id="form-sec">
                <div class="heading">
                    <h3>Complete the form below to secure your subsidy before it's too late.</h3>
                </div>
                <div class="form-main">
                    <!-- Step 1 -->
                    <div class="step-1" id="step-1">
                        <button class="form-btn" id="qualify">See If You Qualify!</button>
                        <p>Keep more in your pocket - have more money to spend on anything.</p>
                    </div>
    
                    <!-- Step 2 -->
                    <div class="step-2" id="step-2">
                        <div class="step-inner-2">
                            <h3 class="question">Do you make less than $50,000 a year?</h3>
                            <!-- <p class="explainer">TO QUALIFY, YOUR ANNUAL INCOME MUST BE UNDER $50,000.</p> -->
                            <button class="form-btn" id="step-2-yes">Yes</button>
                            <button class="form-btn-no" id="step-2-no">No</button>
                        </div>
                    </div>
    
                    <!-- Step 3 -->
                    <div class="step-3" id="step-3">
                        <div class="step-inner-3">
                            <h3 class="question">Are you currently receiving Medicare or Medicaid?</h3>
                            <!-- <p class="explainer">TO QUALIFY, YOU MUST NOT BE ENROLLED IN MEDICARE OR MEDICAID.</p> -->
                            <button class="form-btn" id="step-3-no">No</button>
                            <button class="form-btn-no" id="step-3-yes">Yes</button>
                        </div>
                    </div>
    
                    <!-- Step 4 -->
                    <div class="step-4" id="step-4">
                        <div class="step-inner-4">
                            <h3 class="question">What is your age?</h3>
                            <!-- <p class="explainer">TO QUALIFY, YOU MUST BE BETWEEN 18 AND 64 YEARS OLD.</p> -->
                            <button class="form-btn" id="step-4-18-64">18 to 64</button>
                            <button class="form-btn-no" id="step-4-over-65">Over 65</button>
                        </div>
                    </div>
    
                    <!-- Last Step -->
                    <div class="last-step" id="last-step">
                        <div class="last-step-inner">
                            <h3>$6,400 in Healthcare</h3>
                            <p class="after-heading">Assistance Now Available to Eligible Individuals</p>
                            <p class="thank-you">ThankYou!</p>
                            <p class="after-thankYou">You pre-qualify! Call now to claim your $6,400 coverage and $0 Health Plan.</p>
                            <button class="form-btn" id="click-to-call"><a id="tel-1" class="ctca" href="tel:+18333562849">Click To Call Now</a></button>
                            <p class="after-call-btn" id="call-now">Call Now <a id="tel-2" href="tel:+18333562849">+1 833-356-2849</a></p>
                            <p class="live-agents">Live Wait Time: <span id="fiveMintTimer">0</span> Minutes</p>
                            <p class="agents">Available Agents: 4</p>
                        </div>
                    </div>
    
                    <!-- Form Step -->
                    <div class="form-step" id="form-step">
                        <div class="form-step-inner">
                            <h3>$6,400 in Healthcare</h3>
                            <p class="after-heading">Assistance Now Available to Eligible Individuals</p>
                            <form method="POST" action="" id="healthcareForm">
                                <label for="FirstName">First Name <span style="color: red;">*</span></label>
                                <input type="text" id="FirstName" name="first_name" required>
    
                                <label for="LastName">Last Name <span style="color: red;">*</span></label>
                                <input type="text" id="LastName" name="last_name" required>
    
                                <label for="PhoneNumber">Phone Number <span style="color: red;">*</span></label>
                                <input type="tel" id="PhoneNumber" name="phone_number" required>
    
                                <label for="DOB">Date of Birth <span style="color: red;">*</span></label>
                                <input type="date" id="DOB" name="dob" required>
    
                                <label for="ZipCode">Zip Code <span style="color: red;">*</span></label>
                                <input type="text" id="ZipCode" name="zip_code" required>
    
                                <input type="checkbox" name="consent" id="Consent" required>
                                <label for="Consent">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</label>
    
                                <button class="submit-btn" id="submit">Submit</button>
                            </form>

                            <?php if ($success): ?>
                                <p class="success-message" style="color: green; font-weight: bold; padding-top: 10px;">
                                    ✅ Thank you! Your information has been submitted successfully.
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="reviews-main">
        <div class="review-wraper container">
            <div class="review-heading">
                <h3>Reviews:</h3>
            </div>
            <div class="review-inner">
                <div class="review-1 review-item">
                    <div class="user">
                        <div class="image">
                            <img src="/images/profile-1.webp" alt="Profile">
                        </div>
                        <div class="name-title">
                            <p class="name">John</p>
                            <p class="title">Verified User</p>
                        </div>
                    </div>
                    <div class="star">
                        <img src="/images/stars.webp" alt="Stars">
                    </div>
                    <div class="review-content">
                        <p class="content">I can finally breathe! This subsidy has taken so much financial stress off my shoulders.</p>
                    </div>
                </div>
                <div class="review-2 review-item">
                    <div class="user">
                        <div class="image">
                            <img src="/images/profile-1.webp" alt="Profile">
                        </div>
                        <div class="name-title">
                            <p class="name">Raphael</p>
                            <p class="title">Verified User</p>
                        </div>
                    </div>
                    <div class="star">
                        <img src="/images/stars.webp" alt="Stars">
                    </div>
                    <div class="review-content">
                        <p class="content">I didn't expect this to be real, but I got approved fast! The extra $6,400 is helping me pay my rent and bills with ease.</p>
                    </div>
                </div>
                <div class="review-3 review-item">
                    <div class="user">
                        <div class="image">
                            <img src="/images/profile-1.webp" alt="Profile">
                        </div>
                        <div class="name-title">
                            <p class="name">Nicky</p>
                            <p class="title">Verified User</p>
                        </div>
                    </div>
                    <div class="star">
                        <img src="/images/stars.webp" alt="Stars">
                    </div>
                    <div class="review-content">
                        <p class="content">With prices skyrocketing, this subsidy came at the perfect time. I've used it for groceries, gas, and even a few unexpected expenses. It's truly life-changing!</p>
                    </div>
                </div>
                <div class="review-4 review-item">
                    <div class="user">
                        <div class="image">
                            <img src="/images/profile-1.webp" alt="Profile">
                        </div>
                        <div class="name-title">
                            <p class="name">Edward</p>
                            <p class="title">Verified User</p>
                        </div>
                    </div>
                    <div class="star">
                        <img src="/images/stars.webp" alt="Stars">
                    </div>
                    <div class="review-content">
                        <p class="content">I was struggling with bills, and this subsidy has been a game-changer. Getting financial support like this is rare, and I'm grateful for it!</p>
                    </div>
                </div>
                <div class="review-5 review-item">
                    <div class="user">
                        <div class="image">
                            <img src="/images/profile-1.webp" alt="Profile">
                        </div>
                        <div class="name-title">
                            <p class="name">Jimmy</p>
                            <p class="title">Verified User</p>
                        </div>
                    </div>
                    <div class="star">
                        <img src="/images/stars.webp" alt="Stars">
                    </div>
                    <div class="review-content">
                        <p class="content">$6,400 in extra assistance? Yes, please! I qualified quickly, and now I don't stress about groceries or gas. If you haven't checked yet, do it!</p>
                    </div>
                </div>
                <div class="review-6 review-item">
                    <div class="user">
                        <div class="image">
                            <img src="/images/profile-1.webp" alt="Profile">
                        </div>
                        <div class="name-title">
                            <p class="name">Max</p>
                            <p class="title">Verified User</p>
                        </div>
                    </div>
                    <div class="star">
                        <img src="/images/stars.webp" alt="Stars">
                    </div>
                    <div class="review-content">
                        <p class="content">I'm so happy I found this! Simple process, quick approval, and real financial relief. Highly recommend!</p>
                    </div>
                </div>
            </div>
            <div class="review-btn">
                <a class="btn" href="#form-sec">Get $6400 Health Subsidy Now</a>
            </div>
        </div>
    </section>

    <section class="footer-section">
        <div class="footer container">
            <div class="footer-text">
                <h2>TERMS OF SERVICE:</h2>
                <p>Welcome to ACAPlanAssist.com. We are a referral source designed to provide information and connect consumers with companies that may offer certain insurance coverage options. ACAPlanAssist.com does not act as an insurance broker, agent, or advisor, nor do we make decisions regarding insurance coverage availability or eligibility. The helpline provided on our platform is free to call; however, the services or insurance programs you choose to pursue may involve costs. Neither ACAPlanAssist.com nor any supplemental insurance plans or providers to which you may be connected are endorsed by the U.S. government or the Medicare program. We do not guarantee a specific outcome or result from using our services.</p>
                <p>By submitting your information, you consent to being contacted by one of our agents to discuss your request, gather feedback, or provide assistance with products, services, or plans. These communications may occur via the phone number you provided, even if you are on a do-not-call list. If we are unable to reach you by phone, we may send a text message notifying you of our attempt to contact you. Phone calls and text messages may be sent using automated technology, and standard carrier fees may apply to text messages. You may opt out of communications at any time by informing our customer service team or replying with “STOP” to text messages. By using ACAPlanAssist.com, you acknowledge and agree to these terms. For any questions or assistance, please contact our customer service team.</p>
                <h3>Connect with Us Now: <a href="tel:+18333562849">+1 833-356-2849</a></h3>
            </div>
        </div>
    </section>

    <!-- Script -->
    <script src="/assist/js/6400-health-tax-credit.js"></script>

    <script>
        executeMainScript();
        // *********************************************************
        // ************** Do the Dynamic Number Insertion **********
        // *********************************************************
        
        // Step 1 - Ensure you have the Custom Tag to Find and Replace our Header https://trackdrive.net/assets/trackdrive-optimizer.js script. It will remove it from the lander, and then copy in the most recent trackdrive-optimizer.js from the cloud to make it local JS. Email support@TrackDrive.com for Read Only Access to our Google Tag Manager account with great examples of Custom Tags and Standard Variable Names we Reference in our GTag Variable Replacements for "tokens:"
    
    
        function executeMainScript() {
            console.log("Function for TrackDrive Dynamic Number Insertion Started - Time: " + getCurrentDateTime());
    
    
            // Step 2 - Build the Options JSON Object For the Default Numbers to use and the additional Tokens to Add/Override if found in the QueryString
    
            // Declare variables for cookies so we can use them on the Tokens Object
            var options = {
                offer_token: '138cb562ec9ef658c9b22381048f0113',
                default_number: {
                human_number: '844-704-1890',
                plain_number: '8447041890'
                },
                tokens: {
                source_url: window.location.href,
                gtm_container_id: "GTM-WV3MMCF5"
                }
            };
    
        // Step 3 - Call TrackDrive to Assign a Number using the Options and the Search and Replace Array
    
        Trackdrive.Optimizer.replace_all(options,[
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["844-704-1890", "dashed_number"],
            ["8447041890", "plain_number"]
        ]);

        console.log("Function for TrackDrive Dynamic Number Insertion Ended - Time: " + getCurrentDateTime());
    
        } //End of executeMainScript Function
    
        // Function to return the Current Time as YYYY-MM-DD HH:MM:SS.mmm
        function getCurrentDateTime() {
        var now = new Date();
        var year = now.getFullYear();
        var month = String(now.getMonth() + 1).padStart(2, '0');
        var day = String(now.getDate()).padStart(2, '0');
        var hours = String(now.getHours()).padStart(2, '0');
        var minutes = String(now.getMinutes()).padStart(2, '0');
        var seconds = String(now.getSeconds()).padStart(2, '0');
        var milliseconds = String(now.getMilliseconds()).padStart(3, '0');
    
        return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds + '.' + milliseconds;
        }
    </script>
</body>
</html>