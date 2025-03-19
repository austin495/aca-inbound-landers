// // Step 1 Variables
// const stepOneBtn = document.getElementById('qualify');

// // Step 2 Variables
// const stepTwoYesBtn = document.getElementById('step-2-yes');
// const stepTwoNoBtn = document.getElementById('step-2-no');

// // Step 3 Variables
// const stepThreeYesBtn = document.getElementById('step-3-yes');
// const stepThreeNoBtn = document.getElementById('step-3-no');

// // Step 4 Variables
// const stepFourYesBtn = document.getElementById('step-4-18-64');
// const stepFourNoBtn = document.getElementById('step-4-over-65');

// // Last Step Variables
// const lastStepClickToCall = document.getElementById('click-to-call');
// const lastStepCallNow = document.getElementById('call-now');

// // Variables to track user choices
// let step2Choice = null;
// let step3Choice = null;
// let step4Choice = null;

// // Audio Variables
// let ring = null;
// let audio = null;
// let audio1 = null;
// let audio2 = null;
// let audio3 = null;
// let audio4 = null;
// let audio5 = null;
// let audio6 = null;
// let stepOneTimeout = null;

// function stopAudio() {
//     // Stop all audio elements
//     [audio, audio1, audio2, audio3, audio4, audio5, audio6].forEach(sound => {
//         if (sound) {
//             sound.pause();
//             sound.currentTime = 0;
//         }
//     });
//     // Clear the timeout for step one audio
//     if (stepOneTimeout) {
//         clearTimeout(stepOneTimeout);
//         stepOneTimeout = null;
//     }
// }

// // Click to Call Event Listener
// lastStepClickToCall.addEventListener('click', () => {
//     stopAudio();
// });

// lastStepCallNow.addEventListener('click', () => {
//     stopAudio();
// });

// // Step 1 Event Listener
// stepOneBtn.addEventListener('click', () => {
//     stopAudio();
//     ring = new Audio('/recordings/cash-register-fake-88639.mp3');
//     audio = new Audio('/recordings/First.mp3');
//     ring.play();
//     setTimeout(() => {
//         audio.play();
//     }, 300);

//     document.getElementById('step-1').style.display = 'none';
//     document.getElementById('step-2').style.display = 'block';
// });

// // Step 2 Event Listeners
// stepTwoYesBtn.addEventListener('click', () => {
//     stopAudio();
//     audio1 = new Audio('/recordings/Second.mp3');
//     audio1.play();

//     step2Choice = 'yes';
//     document.getElementById('step-2').style.display = 'none';
//     document.getElementById('step-3').style.display = 'block';
// });

// stepTwoNoBtn.addEventListener('click', () => {
//     stopAudio();
//     audio2 = new Audio('/recordings/Second.mp3');
//     audio2.play();

//     step2Choice = 'no';
//     document.getElementById('step-2').style.display = 'none';
//     document.getElementById('step-3').style.display = 'block';
// });

// // Step 3 Event Listeners
// stepThreeYesBtn.addEventListener('click', () => {
//     stopAudio();
//     audio3 = new Audio('/recordings/DOB-1.mp3');
//     audio3.play();

//     step3Choice = 'yes';
//     document.getElementById('step-3').style.display = 'none';
//     document.getElementById('step-4').style.display = 'block';
// });

// stepThreeNoBtn.addEventListener('click', () => {  
//     stopAudio(); 
//     audio4 = new Audio('/recordings/DOB-1.mp3');
//     audio4.play();

//     step3Choice = 'no';
//     document.getElementById('step-3').style.display = 'none';
//     document.getElementById('step-4').style.display = 'block';
// });

// // Step 4 Event Listeners
// stepFourYesBtn.addEventListener('click', () => {
//     stopAudio();
//     audio5 = new Audio('/recordings/Last.mp3');
//     audio5.play();

//     step4Choice = '18-64';
//     document.getElementById('step-4').style.display = 'none';
//     document.getElementById('last-step').style.display = 'block';
// });

// stepFourNoBtn.addEventListener('click', () => {
//     stopAudio();
//     audio6 = new Audio('/recordings/Last.mp3');
//     audio6.play();

//     step4Choice = 'over-65';
//     document.getElementById('step-4').style.display = 'none';
//     document.getElementById('last-step').style.display = 'block';
// });

// // Function to check conditions and show form
// function checkConditions() {
//     if (step2Choice === 'no' && step3Choice === 'yes' && step4Choice === 'over-65') {
//         document.getElementById('form-step').style.display = 'block';
//     }
// }

// // Five Minute Timer for Last Step
// let time = 300;
// const timerElement = document.getElementById('fiveMintTimer');

// function startTimer() {
//     let time = 300;
//     const interval = setInterval(() => {
//         const minutes = Math.floor(time / 60);
//         const seconds = time % 60;
//         timerElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
//         time--;

//         if (time < 0) {
//             time = 300; // Reset the timer to 5 minutes
//         }
//     }, 1000);
// }

// startTimer();

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

            // Check conditions for form display or go to the last step
            checkConditions();
        });
    }
});

// Function to check conditions and show form instead of last step
function checkConditions() {
    console.log(`Checking conditions: step2Choice=${step2Choice}, step3Choice=${step3Choice}, step4Choice=${step4Choice}`);

    if (step2Choice === 'no' && step3Choice === 'yes' && step4Choice === 'over-65') {
        console.log('Conditions met! Showing form instead of last step.');

        stopAudio();
        
        if (formStep) {
            formStep.style.display = 'block';
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