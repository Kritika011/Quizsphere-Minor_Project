let timeLimit = <?php echo $paper['time_limit']; ?> * 60;
let timer;

function startTimer() {
    timer = setInterval(function() {
        let minutes = Math.floor(timeLimit / 60);
        let seconds = timeLimit % 60;
        document.getElementById("timer").innerText = `${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
        timeLimit--;

        if (timeLimit < 0) {
            clearInterval(timer);
            document.getElementById("examForm").submit();
        }
    }, 1000);
}

function saveAnswer(question_id) {
    const answer = document.querySelector(`input[name="answer_${question_id}"]:checked`).value;
    $.post("exam.php", { question_id: question_id, answer: answer }, function() {
        alert('Answer saved');
    });
}

function nextQuestion() {
    // Implement logic for navigating to the next question
}

function previousQuestion() {
    // Implement logic for navigating to the previous question
}


// Store the remaining timer value back to the session using AJAX (to persist it between page reloads)
window.onbeforeunload = function() {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_timer.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('timer=' + timer);
};


let currentQuestion = 0;
const questions = document.querySelectorAll(".question");

function showQuestion(index) {
    questions[currentQuestion].classList.remove("active");
    currentQuestion = index;
    questions[currentQuestion].classList.add("active");
}

function showPrev() {
    if (currentQuestion > 0) {
        showQuestion(currentQuestion - 1);
    }
}

function saveAndNext() {
    if (currentQuestion < questions.length - 1) {
        showQuestion(currentQuestion + 1);
    }
}

function markForReview(questionNumber) {
    questions[questionNumber - 1].style.backgroundColor = "yellow";
}

showQuestion(0);