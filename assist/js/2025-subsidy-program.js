// Step Variables
const stepOneBtn = document.getElementById('qualify');
const stepTwoYesBtn = document.getElementById('step-2-yes');
const stepTwoNoBtn = document.getElementById('step-2-no');
const stepThreeYesBtn = document.getElementById('step-3-yes');
const stepThreeNoBtn = document.getElementById('step-3-no');
const stepFourYesBtn = document.getElementById('step-4-18-64');
const stepFourNoBtn = document.getElementById('step-4-over-65');
const lastStepClickToCall = document.getElementById('click-to-call');
const lastStepCallNow = document.getElementById('call-now');
const timerElement = document.getElementById('fiveMintTimer');
const formStep = document.getElementById('form-step'); 
const lastStep = document.getElementById('last-step'); // Ensure the last step exists

// Variables to track user choices
let step2Choice = null;
let step3Choice = null;
let step4Choice = null;

// Audio Elements
const audioFiles = {
    ring: '/recordings/cash-register-fake-88639.mp3',
    first: '/recordings/First.mp3',
    second: '/recordings/Second.mp3',
    dob: '/recordings/DOB-1.mp3',
    last: '/recordings/Last.mp3'
};

let currentAudio = null;

// Stop all playing audio
function stopAudio() {
    if (currentAudio) {
        currentAudio.pause();
        currentAudio.currentTime = 0;
        currentAudio = null;
    }
}

// Play audio function
function playAudio(src) {
    stopAudio();
    currentAudio = new Audio(src);
    currentAudio.play();
}

// Click to Call Event Listeners
[lastStepClickToCall, lastStepCallNow].forEach(button => {
    if (button) {
        button.addEventListener('click', stopAudio);
    }
});

// Step 1 Event Listener
if (stepOneBtn) {
    stepOneBtn.addEventListener('click', () => {
        stopAudio();
        playAudio(audioFiles.ring);
        setTimeout(() => playAudio(audioFiles.first), 300);

        document.getElementById('step-1').style.display = 'none';
        document.getElementById('step-2').style.display = 'block';
    });
}

// Step 2 Event Listeners
[stepTwoYesBtn, stepTwoNoBtn].forEach(btn => {
    if (btn) {
        btn.addEventListener('click', () => {
            step2Choice = btn === stepTwoYesBtn ? 'yes' : 'no';

            if (step2Choice === 'yes') {
                setTimeout(() => playAudio(audioFiles.second), 300);
                document.getElementById('step-2').style.display = 'none';
                document.getElementById('step-3').style.display = 'block';
            } else {
                stopAudio();
                document.getElementById('step-2').style.display = 'none';
                formStep.style.display = 'block';
            }
        });
    }
});

// Step 3 Event Listeners
[stepThreeYesBtn, stepThreeNoBtn].forEach(btn => {
    if (btn) {
        btn.addEventListener('click', () => {
            step3Choice = btn === stepThreeYesBtn ? 'yes' : 'no';

            if (step3Choice === 'no') {
                playAudio(audioFiles.dob);
                document.getElementById('step-3').style.display = 'none';
                document.getElementById('step-4').style.display = 'block';
            } else {
                stopAudio();
                document.getElementById('step-3').style.display = 'none';
                formStep.style.display = 'block';
            }
        });
    }
});

// Step 4 Event Listeners
[stepFourYesBtn, stepFourNoBtn].forEach(btn => {
    if (btn) {
        btn.addEventListener('click', () => {
            step4Choice = btn === stepFourYesBtn ? '18-64' : 'over-65';

            if (step4Choice === '18-64') {
                playAudio(audioFiles.last);
                document.getElementById('step-4').style.display = 'none';
                lastStep.style.display = 'block';
            } else {
                stopAudio();
                document.getElementById('step-4').style.display = 'none';
                formStep.style.display = 'block';
            }
        });
    }
});

document.getElementById("healthcareForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = {
      FirstName: document.getElementById("FirstName").value,
      LastName: document.getElementById("LastName").value,
      PhoneNumber: document.getElementById("PhoneNumber").value,
      DOB: document.getElementById("DOB").value,
      ZipCode: document.getElementById("ZipCode").value,
      Consent: document.getElementById("Consent").checked ? "Yes" : "No",
      SourceURL: window.location.href
    };

    fetch("https://script.google.com/a/macros/evolvetechinnovations.com/s/AKfycbyv2Ce4RHlWrJaYs9GVThag8ib-DKIhqDGItRBQFYyz1ko-QgxmFVTdtwk3pwvpRiEbBQ/exec", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json",
      },
    })
    .then(res => res.text())
    .then(data => {
      alert("Form submitted successfully!");
      document.getElementById("healthcareForm").reset();
    })
    .catch(err => {
      console.error("Error:", err);
      alert("There was a problem submitting your form.");
    });
  });

// Five Minute Timer
let timerInterval = null;

function startTimer() {
    let time = 300;

    if (timerElement) {
        clearInterval(timerInterval);

        timerInterval = setInterval(() => {
            const minutes = Math.floor(time / 60);
            const seconds = time % 60;
            timerElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            time--;

            if (time < 0) {
                clearInterval(timerInterval);
                startTimer(); // Restart timer if needed
            }
        }, 1000);
    }
}

// Start the timer when script loads
startTimer();