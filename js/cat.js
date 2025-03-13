// Your JavaScript code here
let isSpeaking = false;
let isPaused = false;
let utterance = new SpeechSynthesisUtterance();

function toggleSpeech() {
    if (!isSpeaking && !isPaused) {
        startSpeaking();
    } else if (isSpeaking && !isPaused) {
        pauseSpeaking();
    } else {
        resumeSpeaking();
    }
}

function startSpeaking() {
    let textToSpeak = document.getElementById("h").innerText + ". " +
                     document.getElementById("pp").innerText + ". " +
                     document.getElementById("catList").innerText + ". " +
                     document.getElementById("ull").innerText + ". " +
                     document.getElementById("cat_List").innerText;
    utterance.text = textToSpeak;
    speechSynthesis.speak(utterance);
    isSpeaking = true;
    document.getElementById("toggleSpeech").innerHTML = '<i class="fas fa-pause"></i>';
    utterance.onend = function () {
        isSpeaking = false;
        document.getElementById("toggleSpeech").innerHTML = '<i class="fas fa-volume-up"></i>';
    };
}

function pauseSpeaking() {
    speechSynthesis.pause();
    isPaused = true;
    document.getElementById("toggleSpeech").innerHTML = '<i class="fas fa-play"></i>';
}

function resumeSpeaking() {
    speechSynthesis.resume();
    isPaused = false;
    document.getElementById("toggleSpeech").innerHTML = '<i class="fas fa-pause"></i>';
}
