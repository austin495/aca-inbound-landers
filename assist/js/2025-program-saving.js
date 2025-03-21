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
            playAudio(audioFiles.second);
            step2Choice = btn === stepTwoYesBtn ? 'yes' : 'no';

            console.log(`Step 2 Choice: ${step2Choice}`); 

            document.getElementById('step-2').style.display = 'none';
            document.getElementById('step-3').style.display = 'block';
        });
    }
});

// Step 3 Event Listeners
[stepThreeYesBtn, stepThreeNoBtn].forEach(btn => {
    if (btn) {
        btn.addEventListener('click', () => {
            playAudio(audioFiles.dob);
            step3Choice = btn === stepThreeYesBtn ? 'yes' : 'no';

            console.log(`Step 3 Choice: ${step3Choice}`);

            document.getElementById('step-3').style.display = 'none';
            document.getElementById('step-4').style.display = 'block';
        });
    }
});

// Step 4 Event Listeners
[stepFourYesBtn, stepFourNoBtn].forEach(btn => {
    if (btn) {
        btn.addEventListener('click', () => {
            playAudio(audioFiles.last);
            step4Choice = btn === stepFourYesBtn ? '18-64' : 'over-65';

            console.log(`Step 4 Choice: ${step4Choice}`);

            document.getElementById('step-4').style.display = 'none';
            document.getElementById('last-step').style.marginBottom = '-150px';
            document.getElementsByClassName('footer-section')[0].style.paddingTop = '180px';

            if (window.innerWidth <= 1024) {
                document.getElementById('last-step').style.marginBottom = '-150px'; // Reset margin
                document.getElementsByClassName('footer-section')[0].style.paddingTop = '100px'; // Reset padding
            }

            if (window.innerWidth <= 600) {
                document.getElementById('last-step').style.marginBottom = '0px'; // Reset margin
                document.getElementsByClassName('footer-section')[0].style.paddingTop = '0px'; // Reset padding
            }

            // Check conditions for form display or go to the last step
            checkConditions();
        });
    }
});

// Function to check conditions and show form instead of last step
function checkConditions() {
    console.log(`Checking conditions: step2Choice=${step2Choice}, step3Choice=${step3Choice}, step4Choice=${step4Choice}`);

    if (step2Choice === 'no' || step3Choice === 'yes' || step4Choice === 'over-65') {
        console.log('Conditions met! Showing form instead of last step.');

        stopAudio();
        
        if (formStep) {
            formStep.style.display = 'block';
            document.getElementById('form-step').style.marginBottom = '-150px';
            document.getElementsByClassName('footer-section')[0].style.paddingTop = '180px';

            if (window.innerWidth <= 1024) {
                document.getElementById('form-step').style.marginBottom = '-150px'; // Reset margin
                document.getElementsByClassName('footer-section')[0].style.paddingTop = '100px'; // Reset padding
            }

            if (window.innerWidth <= 600) {
                document.getElementById('form-step').style.marginBottom = '0px'; // Reset margin
                document.getElementsByClassName('footer-section')[0].style.paddingTop = '50px'; // Reset padding
            }
        } else {
            console.error("Element with ID 'form-step' not found!");
        }

        // Hide the last step
        if (lastStep) {
            lastStep.style.display = 'none';
        }

    } else {
        // Show the last step if conditions are not met
        if (lastStep) {
            lastStep.style.display = 'block';
        }
    }
}

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