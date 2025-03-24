<?php
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_data = [
        'First Name' => htmlspecialchars($_POST['first_name']),
        'Last Name' => htmlspecialchars($_POST['last_name']),
        'Phone Number' => htmlspecialchars($_POST['phone_number']),
        'DOB' => htmlspecialchars($_POST['dob']),
        'Zip Code' => htmlspecialchars($_POST['zip_code']),
        'Consent' => isset($_POST['consent']) ? 'Yes' : 'No',
        'Source URL' => htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'Direct')
    ];

    $url = 'https://script.google.com/macros/s/AKfycbwUMzggxXGVCLzlFCY5RekrkxVMJURT77GIbnvE5tplpyefAll_bLE_xMTvzLb8y2_NoQ/exec';
    $postData = http_build_query($form_data);

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => $postData,
        ],
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result !== FALSE) {
        $success = true;
    } else {
        error_log('Failed to submit data to Google Sheets');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2025 Subsidy Program Get Up to $6,140 in Savings!</title>
    <link rel="stylesheet" href="/assist/css/style.css">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WV3MMCF5');</script>
    <!-- End Google Tag Manager -->

    <style>
        .success-message {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WV3MMCF5"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <section class="hero-section">
        <div class="hero container">
            <div class="hero-text">
                <h1>2025 Relief Program - <br>Receive Up to <span>$6,140</span> in Savings Now!</h1>
                <p>Low-Income Households Can Now Access Up to $6,140 in Subsidy Savings for Everyday Necessities Like Food, Gas, and Bills!</p>
                <a href="#form" class="btn">See If You Qualify!</a>
                <p class="under-btn">A quick check could unlock big savings for you!</p>
            </div>
            <div class="hero-img">
                <img src="/images/card-2.webp" alt="Credit Card">
            </div>
        </div>
    </section>

    <section class="form-heading-section">
        <div class="form-heading container">
            <div class="form-heading">
                <h2><span>Stress Free Process</span> - Get Approved for Your Benefits in Minutes! <span>Don't Miss Out!</span></h2>
            </div>
        </div>
    </section>

    <section class="form-main-section" id="form">
        <div class="form container">
            <div class="form-main">
                <!-- Step 1 -->
                <div class="step-1" id="step-1">
                    <button class="form-btn" id="qualify">See If You Qualify!</button>

                    <div class="badges">
                        <h3>Trusted and secure:</h3>
                        <img src="/images/badges.webp" alt="Badges">
                    </div>
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
                        <p class="after-thankYou">You pre-qualify! Call now to claim your <b>$6,400</b> coverage and <b>$0</b> Health Plan.</p>
                        <button class="form-btn" id="click-to-call"><a id="tel-1" class="ctca" href="tel:+18447041890">Click To Call Now</a></button>
                        <p class="after-call-btn" id="call-now">Call Now <a id="tel-2" href="tel:+18447041890">+1 844-704-1890</a></p>
                        <p class="live-agents">Live Wait Time: <span id="fiveMintTimer">0</span> Minutes</p>
                        <p class="agents">Available Agents: 4</p>
                    </div>
                </div>

                <!-- Form Step -->
                <div class="form-step" id="form-step">
                    <div class="form-step-inner">
                        <h3>$6,400 in Healthcare</h3>
                        <p class="after-heading">Assistance Now Available to Eligible Individuals</p>
                        <form action="" id="healthcareForm">
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
    </section>

    <section class="footer-section">
        <div class="footer container">
            <div class="footer-text">
                <h2>TERMS OF SERVICE:</h2>
                <p>Welcome to ACAPlanAssist.com. ACAPlanAssist.com is owned and operated by NMS Insurance Group LLC (https://nmsinsurancegroup.com/). We are a referral source designed to provide information and connect consumers with companies that may offer certain insurance coverage options. ACAPlanAssist.com does not act as an insurance broker, agent, or advisor, nor do we make decisions regarding insurance coverage availability or eligibility. The helpline provided on our platform is free to call; however, the services or insurance programs you choose to pursue may involve costs. Neither ACAPlanAssist.com nor any supplemental insurance plans or providers to which you may be connected are endorsed by the U.S. government or the Medicare program. We do not guarantee a specific outcome or result from using our services.</p>
                <p>By submitting your information, you consent to being contacted by one of our agents to discuss your request, gather feedback, or provide assistance with products, services, or plans. These communications may occur via the phone number you provided, even if you are on a do-not-call list. If we are unable to reach you by phone, we may send a text message notifying you of our attempt to contact you. Phone calls and text messages may be sent using automated technology, and standard carrier fees may apply to text messages. You may opt out of communications at any time by informing our customer service team or replying with “STOP” to text messages. By using ACAPlanAssist.com, you acknowledge and agree to these terms. For any questions or assistance, please contact our customer service team.</p>
                <h3>Connect with Us Now: <a href="tel:+18447041890">+1 844-704-1890</a></h3>
            </div>
        </div>3
    </section>

    <!-- Script -->
    <script src="/assist/js/2025-subsidy-program.js"></script>
</body>
</html>