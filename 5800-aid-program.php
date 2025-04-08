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
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>$5800 Aid Program</title>
    <meta
      name="description"
      content="Get a $5,800 Subsidy When You Call For a Free Health Plan"
    />
    <meta name="keywords" content="Affordable Care Act, ACA" />
    <link href="/assist/css/5800-aid-program.css" rel="stylesheet" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WV3MMCF5');</script>
    <!-- End Google Tag Manager -->

    <style>
      .typing-animation {
        display: inline-flex;
        align-items: center;
      }

      .typing-dot {
        width: 8px;
        height: 8px;
        background-color: #a7a7a7;
        border-radius: 50%;
        margin-right: 4px;
        animation: typing 0.5s infinite;
      }

      @keyframes typing {
        0% {
          opacity: 0.3;
          transform: scale(1);
        }

        50% {
          opacity: 1;
          transform: scale(1.05);
        }

        25% {
          opacity: 0.3;
          transform: scale(1);
        }
      }
    </style>
  </head>

  <body class="body-wa-bg">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WV3MMCF5"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <main class="min-h-screen">
      <div class="max-w-4xl mx-auto text-center text-gray-600">
        <div class="p-4">
          <p class="font-serif text-md sm:text-lg font-bold mt-2">
            <span class="text-red-600">Warning:</span> Enrollment closes on
            <span id="currentDate"></span> at 8pm EST.
          </p>
          <h2 class="font-bold text-xl sm:text-3xl mt-1">
            Unlock a $5,800 Subsidy for Americans to Cover Groceries, Gas, Rent,
            and Medical Expenses
          </h2>
        </div>
        <div class="w-full md:col-span-1 text-center block">
          <div class="text-sm flex items-center justify-center">
            <span class="relative flex h-4 w-4 inline-flex mr-2">
              <span
                class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75 bg-green-500"
              ></span>
              <span
                class="relative inline-flex rounded-full h-4 w-4 bg-green-500"
              ></span>
            </span>
            Eliza is Online.
          </div>
        </div>
      </div>

      <div class="max-w-md mx-auto">
        <div class="p-4">
          <div class="space-y-4">
            <div class="chat-container pb-2">
              <!-- Agent message -->
              <div id="agentBlock1" class="flex items-end w-5/6">
                <div class="flex-shrink-0">
                  <img
                    class="w-8 h-8 rounded-full"
                    src="/images/staff-1.jpg"
                    alt="Sender Avatar"
                  />
                </div>
                <div class="ml-3 agent-chat">
                  <div
                    id="initTyping"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 inline-block"
                  >
                    <div class="typing-animation">
                      <div class="typing-dot"></div>
                      <div class="typing-dot"></div>
                      <div class="typing-dot"></div>
                    </div>
                  </div>
                  <div
                    id="msg1"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p class="text-md text-gray-800">Hi 👋</p>
                  </div>
                  <div
                    id="msg2"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p class="text-md text-gray-800">
                      I'm Eliza from Health Subsidies.
                    </p>
                  </div>
                  <div
                    id="msg3"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p class="text-md text-gray-800">
                      Want to find out if you qualify for up a $5,800 subsidy?
                      Tap Yes! 😃
                    </p>
                  </div>
                  <div
                    id="msg4"
                    class="p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <div class>
                      <button
                        class="chat-button text-white font-bold bg-blue-500 rounded-full py-3 px-12"
                        type="button"
                        data-form-step="1"
                        data-form-value="Yes"
                      >
                        Yes
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- User message -->
              <div
                id="userBlock1"
                class="flex items-start justify-end pt-4 hidden"
              >
                <div class="mr-3 receiver-chat">
                  <div
                    id="msg5"
                    class="bg-blue-500 text-white p-3 rounded-lg shadow-xs mt-2 inline-block"
                  >
                    <p class="text-md">Yes</p>
                  </div>
                </div>
                <div class="flex-shrink-0">
                  <img
                    class="w-8 h-8 rounded-full"
                    src="/images/profile.webp"
                    alt="Receiver Avatar"
                  />
                </div>
              </div>

              <!-- Agent message -->
              <div id="agentBlock2" class="flex items-end w-5/6 hidden pt-4">
                <div class="flex-shrink-0">
                  <img
                    class="w-8 h-8 rounded-full"
                    src="/images/staff-1.jpg"
                    alt="Sender Avatar"
                  />
                </div>
                <div class="ml-3 agent-chat">
                  <div
                    id="msg6"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p class="text-md text-gray-800">
                      Okay, let me ask you two quick questions.
                    </p>
                  </div>
                  <div
                    id="msg7"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p class="text-md text-gray-800">
                      Do you make less than $50,000/year? Tap Yes or No.
                    </p>
                  </div>
                  <div
                    id="msg8"
                    class="p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <div class="grid grid-rows-1 grid-cols-2 gap-x-3">
                      <button
                        class="chat-button text-white font-bold bg-blue-500 rounded-full py-3 px-8"
                        type="button"
                        data-form-step="2"
                        data-form-value="Yes"
                      >
                        Yes
                      </button>
                      <button
                        class="chat-button text-white font-bold bg-blue-500 rounded-full py-3 px-8"
                        type="button"
                        data-form-step="2"
                        data-form-value="No"
                      >
                        No
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- User message -->
              <div id="userBlock2" class="flex items-start justify-end hidden">
                <div class="mr-3 receiver-chat">
                  <div
                    class="bg-blue-500 text-white p-3 rounded-lg shadow-xs mt-2 inline-block"
                  >
                    <p id="msg9yes" class="text-md hidden">Yes</p>
                    <p id="msg9no" class="text-md hidden">No</p>
                  </div>
                </div>
                <div class="flex-shrink-0">
                  <img
                    class="w-8 h-8 rounded-full"
                    src="/images/profile.webp"
                    alt="Receiver Avatar"
                  />
                </div>
              </div>

              <!-- Agent message -->
              <div id="agentBlock3" class="flex items-end w-5/6 hidden pt-4">
                <div class="flex-shrink-0">
                  <img
                    class="w-8 h-8 rounded-full"
                    src="/images/staff-1.jpg"
                    alt="Sender Avatar"
                  />
                </div>

                <div class="ml-3 agent-chat">
                  <div
                    id="msg10"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p class="text-md text-gray-800">
                      Are you on medicaid or medicare?
                    </p>
                  </div>
                  <div
                    id="msg11"
                    class="p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <div class="grid grid-rows-1 grid-cols-2 gap-x-3">
                      <button
                        class="chat-button text-white font-bold bg-blue-500 rounded-full py-3 px-8"
                        id="syes"
                        type="button"
                        data-form-step="3"
                        data-form-value="Yes"
                      >
                        Yes
                      </button>
                      <button
                        class="chat-button text-white font-bold bg-blue-500 rounded-full py-3 px-8 funnel-complete-btn"
                        id="sno"
                        type="button"
                        data-form-step="3"
                        data-form-value="No"
                      >
                        No
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- User message -->
              <div id="userBlock3" class="flex items-start justify-end hidden">
                <div class="mr-3 receiver-chat">
                  <div
                    class="bg-blue-500 text-white p-3 rounded-lg shadow-xs mt-2 inline-block"
                  >
                    <p id="msg12yes" class="text-md hidden">Yes</p>
                    <p id="msg12no" class="text-md hidden">No</p>
                    <p id="msg12medicaid" class="text-md hidden">Yes</p>
                  </div>
                </div>
                <div class="flex-shrink-0">
                  <img
                    class="w-8 h-8 rounded-full"
                    src="/images/profile.webp"
                    alt="Receiver Avatar"
                  />
                </div>
              </div>

              <!-- Agent message -->
              <div id="agentBlock4" class="flex items-end w-5/6 hidden pt-4">
                <div class="flex-shrink-0">
                  <img
                    class="w-8 h-8 rounded-full"
                    src="/images/staff-1.jpg"
                    alt="Sender Avatar"
                  />
                </div>
                <div class="ml-3 agent-chat">
                  <div
                    id="msg13"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p class="text-md text-gray-800">🎉 Congratulations! 🎁</p>
                  </div>
                  <div
                    id="msg14"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p id="msg14approved" class="text-md text-gray-800 hidden">
                      You Qualify For a $5,800 Subsidy.
                    </p>
                    <p
                      id="msg14disapproved"
                      class="text-md text-gray-800 hidden"
                    >
                      You Can Use it For Your Grocery, Rent, Medical Expenses,
                      And So On.
                    </p>
                  </div>
                  <div
                    id="msg15"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p class="text-md text-gray-800">
                      You can use it for your grocery, rent, medical expenses,
                      and so on.
                    </p>
                  </div>
                  <div
                    id="msg16"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p id="msg16approved" class="text-md text-gray-800 hidden">
                      Tap the number button below to get your <b>$5,800</b>.
                      It only takes 2 minutes.
                    </p>
                    <p
                      id="msg16disapproved"
                      class="text-md text-gray-800 hidden"
                    >
                      Tap the number button below to get your <b>$5,800</b>.
                      It only takes 2 minutes.
                    </p>
                  </div>
                  <div
                    id="msg17"
                    class="rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p class="text-md text-gray-800 py-2">
                      <a
                        id="PrimaryNumber"
                        href="tel:+18447041890"
                        class="chat-button text-white font-bold bg-blue-500 py-3 px-2 hidden ttc-button"
                        >+1 844-704-1890</a
                      >
                    </p>
                  </div>

                  <div
                    id="msg18"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p class="text-md text-gray-800">
                      Sorry, but the questions you answered have helped us
                      determine that we are not able to help you at this time.
                    </p>
                  </div>

                  <div
                    id="msg19"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p class="text-md text-gray-800">Have a nice day! 😃</p>
                  </div>
                </div>
              </div>
              <div id="agentBlock5" class="flex items-end w-5/6 hidden pt-4">
                <div class="flex-shrink-0">
                  <img
                    class="w-8 h-8 rounded-full"
                    src="/images/staff-1.jpg"
                    alt="Sender Avatar"
                  />
                </div>
                <div class="ml-3 agent-chat">
                  <div
                    id="msg20"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p class="text-md text-gray-800">
                      Sorry, but the questions you answered have helped us
                      determine that we are not able to help you at this time.
                    </p>
                  </div>
                  <div
                    id="msg21"
                    class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                  >
                    <p id="msg21approved" class="text-md text-gray-800 hidden">
                      Have a nice day! 😃
                    </p>
                  </div>
                </div>

                <div
                  id="msg25"
                  class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                >
                  <p class="text-md text-gray-800">
                    Sorry, but the questions you answered have helped us
                    determine that we are not able to help you at this time.
                  </p>
                </div>

                <div
                  id="msg26"
                  class="bg-gray-200 p-3 rounded-lg shadow-xs mt-2 w-fit hidden"
                >
                  <p class="text-md text-gray-800">Have a nice day! 😃</p>
                </div>
              </div>
            </div>

            <!-- Disconnect message -->
            <div id="disconnected" class="pt-2 hidden">
              <div class="relative flex py-5 items-center">
                <div class="flex-grow border-t border-gray-200"></div>
                <span class="flex-shrink mx-4 text-gray-300 text-xs"
                  >Chat Closed</span
                >
                <div class="flex-grow border-t border-gray-200"></div>
              </div>
            </div>

            <!-- Form -->
             <div class="form-main hidden">
              <div class="form-wraper">
                <form method="POST" action="" id="healthcareForm">
                  <div class="form-fields">
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
                  </div>
                  
                  <div class="form-consent">
                    <input type="checkbox" name="consent" id="Consent" required>
                    <label for="Consent">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</label>
                  </div>

                  <div class="form-button">
                    <button class="submit-btn w-full text-white font-bold bg-blue-500 rounded-full py-3 px-12" id="submit">Submit</button>
                  </div>
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
    </main>

    <div id="tcpa" class="pt-2 hidden">
      <div
        class="mx-auto max-w-7xl overflow-hidden px-6 lg:px-8 text-sm sm:text-md leading-5 sm:leading-6 text-gray-500"
      >
        <div class="tcpa-container text-xs text-center leading-5 text-gray-500">
          <p>
            By clicking to call, you consent to be contacted and receive
            communications and messages from us and/or one or more of our
            service providers, partners, affiliates, or a third party
            (collectively, "Partners") via a live agent, artificial, automated,
            or pre-recorded voice, by email and by Short Message Service ("SMS")
          </p>
          <p class="pt-2">
            You consent to be contacted even if your Contact Info appears on our
            or ours or our Partners' Do Not Call / Do Not Email List, a State or
            National Do Not Call Registry, or any other Do Not Contact List. You
            consent and agree to our
            <a href="#" target="_blank"><strong>Terms of Use</strong></a> and
            <a href="#" target="_blank"><strong>Privacy Policies</strong></a>
            and our Full
            <a href="#" target="_blank"><strong>TCPA Disclosure</strong></a
            >.
          </p>
        </div>
      </div>
    </div>

    <div id="footer">
      <div>
        <div>© 2025 acaplanassist All Rights Reserved.</div>
        <div>
          DISCLOSURES: This page is an advertorial and not a news article, blog, or consumer protection update.
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function () {
        var tempCssClass;

        setTimeout(function () {
          $("#initTyping").remove();
          $("#msg1").removeClass("hidden").after(typingEffect());
          setTimeout(function () {
            $(".temp-typing").remove();
            $("#msg2").removeClass("hidden").after(typingEffect());
            scrollToBottom();
            setTimeout(function () {
              $(".temp-typing").remove();
              $("#msg3").removeClass("hidden").after(typingEffect());
              scrollToBottom();
              setTimeout(function () {
                $(".temp-typing").remove();
                $("#msg4").removeClass("hidden");
              }, 0);
            }, 1750);
          }, 1250);
        }, 750);

        var buttonValue;
        var currentStep;

        $("button.chat-button").on("click", function () {
          currentStep = $(this).attr("data-form-step");
          buttonValue = $(this).attr("data-form-value");

          if (currentStep == 1) {
            $("#agentBlock2 .agent-chat").prepend(typingEffect());
            $("#msg4").addClass("hidden");
            $("#userBlock1").removeClass("hidden");
            scrollToBottom();
            setTimeout(function () {
              $("#agentBlock2").removeClass("hidden");
              scrollToBottom();
              setTimeout(function () {
                $(".temp-typing").remove();
                $("#msg6").removeClass("hidden").after(typingEffect());
                scrollToBottom();
                setTimeout(function () {
                  $(".temp-typing").remove();
                  $("#msg7").removeClass("hidden").after(typingEffect());
                  scrollToBottom();
                  setTimeout(function () {
                    $(".temp-typing").remove();
                    $("#msg8").removeClass("hidden");
                    scrollToBottom();
                  }, 0);
                }, 1750);
              }, 2250);
            }, 50);
          }

          if (currentStep == 2) {
            $("#agentBlock3 .agent-chat").prepend(typingEffect());
            $("#msg8").addClass("hidden");
            $("#userBlock2").removeClass("hidden");

            if (buttonValue == "No") {
              $("#msg9no").removeClass("hidden");
            } else {
              $("#msg9yes").removeClass("hidden");
            }

            scrollToBottom();
            setTimeout(function () {
              $("#agentBlock3").removeClass("hidden");
              scrollToBottom();
              setTimeout(function () {
                $(".temp-typing").remove();
                $("#msg10").removeClass("hidden").after(typingEffect());
                scrollToBottom();
                setTimeout(function () {
                  $(".temp-typing").remove();
                  $("#msg11").removeClass("hidden");
                  scrollToBottom();
                }, 0);
              }, 1750);
            }, 50);
          }

          if (currentStep == 3) {
            $("#agentBlock4 .agent-chat").prepend(typingEffect());
            $("#msg11").addClass("hidden");
            $("#userBlock3").removeClass("hidden");

            if (buttonValue == "No") {
              $("#msg12no").removeClass("hidden");
              setTimeout(function () {
                $("#agentBlock4").removeClass("hidden");
                scrollToBottom();
                setTimeout(function () {
                  $(".temp-typing").remove();
                  $("#msg13").removeClass("hidden").after(typingEffect());
                  scrollToBottom();
                  setTimeout(function () {
                    $(".temp-typing").remove();
                    $("#msg14").removeClass("hidden").after(typingEffect());
                    scrollToBottom();
                    setTimeout(function () {
                      $(".temp-typing").remove();
                      $("#msg15").removeClass("hidden").after(typingEffect());
                      scrollToBottom();
                      setTimeout(function () {
                        $(".temp-typing").remove();
                        $("#msg16").removeClass("hidden").after(typingEffect());
                        scrollToBottom();
                        setTimeout(function () {
                          $(".temp-typing").remove();
                          $("#msg17").removeClass("hidden");
                          scrollToBottom();
                          afterDelay(execute, 120000);
                        }, 0);
                      }, 2250);
                    }, 1250);
                  }, 1750);
                }, 1250);
              }, 250);
            } else if (buttonValue == "Yes") {
              $("#msg12yes").removeClass("hidden");

              // Check if Step 2 was 'No' or Step 3 is 'Yes'
              const step2Answer = $("#msg9no").is(":visible") ? "no" : "yes";
              if (step2Answer === "no" || buttonValue === "Yes") {
                $(".form-main").removeClass("hidden");
                $("#agentBlock4, #agentBlock5").addClass("hidden");
                scrollToBottom();
              }
            }

            if ($("#hdnApprovalStatus").val() == "no") {
              $("#PrimaryNumber").removeClass("hidden");
              $("#PrimaryNumber1").removeClass("hidden");
              $("#msg14approved").removeClass("hidden");
              $("#msg16approved").removeClass("hidden");
              $("#msg21approved").removeClass("hidden");
              $("#msg23approved").removeClass("hidden");
            } else {
              $("#PrimaryNumber").removeClass("hidden");
              $("#PrimaryNumber1").removeClass("hidden");
              $("#msg14approved").removeClass("hidden");
              $("#msg16approved").removeClass("hidden");
              $("#msg21approved").removeClass("hidden");
              $("#msg23approved").removeClass("hidden");
            }
            scrollToBottom();
          }
        });

        function scrollToBottom(elementId) {
          var object = $("main");
          $("html, body").animate(
            {
              scrollTop:
                object.offset().top + object.outerHeight() - $(window).height(),
            },
            "fast"
          );
        }
      });

      function typingEffect(cssClass) {
        string =
          '<div class="temp-typing bg-gray-200 p-3 rounded-lg shadow-xs mt-2 inline-block">';
        string += '<div class="typing-animation">';
        string += '<div class="typing-dot"></div>';
        string += '<div class="typing-dot"></div>';
        string += '<div class="typing-dot"></div>';
        string += "</div>";
        string += "</div>";

        return string;
      }

      var daysOfWeek = [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
      ];
      var months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
      ];

      var currentDate = new Date();
      var currentDayOfWeek = daysOfWeek[currentDate.getDay()];
      var currentMonth = months[currentDate.getMonth()];
      var currentDay = currentDate.getDate();
      var currentYear = currentDate.getFullYear();
      var formattedDate =
        currentDayOfWeek +
        ", " +
        ("0" + (currentDate.getMonth() + 1)).slice(-2) +
        "/" +
        ("0" + currentDay).slice(-2) +
        "/" +
        currentYear;
      document.getElementById("currentDate").textContent = formattedDate;
    </script>

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