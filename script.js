// Step 1 Variables
const stepOneBtn = document.getElementById('qualify');

// Step 2 Variables
const stepTwoYesBtn = document.getElementById('step-2-yes');
const stepTwoNoBtn = document.getElementById('step-2-no');

// Step 3 Variables
const stepThreeYesBtn = document.getElementById('step-3-yes');
const stepThreeNoBtn = document.getElementById('step-3-no');

// Step 4 Variables
const stepFourYesBtn = document.getElementById('step-4-18-64');
const stepFourNoBtn = document.getElementById('step-4-over-65');

// Last Step Variables
const lastStepClickToCall = document.getElementById('click-to-call');
const lastStepCallNow = document.getElementById('call-now');

// Click to Call Event Listener
lastStepClickToCall.addEventListener('click', () => {
    stopAudio();
});

// Audio Variables
let ring = null;
let audio = null;
let audio1 = null;
let audio2 = null;
let audio3 = null;
let audio4 = null;
let audio5 = null;
let audio6 = null;
let stepOneTimeout = null;

function stopAudio() {
    // Stop all audio elements
    [ring, audio, audio1, audio2, audio3, audio4, audio5, audio6].forEach(sound => {
        if (sound) {
            sound.pause();
            sound.currentTime = 0;
        }
    });
    // Clear the timeout for step one audio
    if (stepOneTimeout) {
        clearTimeout(stepOneTimeout);
        stepOneTimeout = null;
    }
}

// Step 1 Event Listener
stepOneBtn.addEventListener('click', () => {
    stopAudio();
    ring = new Audio('/recordings/cash-register-fake-88639.mp3');
    audio = new Audio('/recordings/First.mp3');
    ring.play();
    setTimeout(() => {
        audio.play();
    }, 300);

    document.getElementById('step-1').style.display = 'none';
    document.getElementById('step-2').style.display = 'block';
});

// Step 2 Event Listeners
stepTwoYesBtn.addEventListener('click', () => {
    stopAudio();
    audio1 = new Audio('/recordings/Second.mp3');
    audio1.play();

    document.getElementById('step-2').style.display = 'none';
    document.getElementById('step-3').style.display = 'block';
});

stepTwoNoBtn.addEventListener('click', () => {
    stopAudio();
    audio2 = new Audio('/recordings/Second.mp3');
    audio2.play();

    document.getElementById('step-2').style.display = 'none';
    document.getElementById('step-4').style.display = 'block';
});

// Step 3 Event Listeners
stepThreeYesBtn.addEventListener('click', () => {
    stopAudio();
    audio3 = new Audio('/recordings/DOB-1.mp3');
    audio3.play();

    document.getElementById('step-3').style.display = 'none';
    document.getElementById('step-4').style.display = 'block';
});

stepThreeNoBtn.addEventListener('click', () => {  
    stopAudio(); 
    audio4 = new Audio('/recordings/DOB-1.mp3');
    audio4.play();

    document.getElementById('step-3').style.display = 'none';
    document.getElementById('last-step').style.display = 'block';
});

// Step 4 Event Listeners
stepFourYesBtn.addEventListener('click', () => {
    stopAudio();
    audio5 = new Audio('/recordings/Last.mp3');
    audio5.play();

    document.getElementById('step-4').style.display = 'none';
    document.getElementById('last-step').style.display = 'block';
});

stepFourNoBtn.addEventListener('click', () => {
    stopAudio();
    audio6 = new Audio('/recordings/Last.mp3');
    audio6.play();

    document.getElementById('step-4').style.display = 'none';
    document.getElementById('last-step').style.display = 'block';
});

// Five Minute Timer for Last Step
let time = 300;
const timerElement = document.getElementById('fiveMintTimer');

function startTimer() {
    let time = 300;
    const interval = setInterval(() => {
        const minutes = Math.floor(time / 60);
        const seconds = time % 60;
        timerElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        time--;

        if (time < 0) {
            time = 300; // Reset the timer to 5 minutes
        }
    }, 1000);
}

startTimer();
