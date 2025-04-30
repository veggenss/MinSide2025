// Set cookie
document.cookie = "username=spyware; expires=Thu, 01 Jan 2026 00:00:00 GMT";

// Data storage for daily waste
const data = [];

// Elements
const form = document.getElementById('data-form');
const tableBody = document.querySelector('#data-table tbody');
const chartCanvas = document.getElementById('chart');
const quizButtons = document.querySelectorAll('.quiz-btn');
const questionElement = document.getElementById('question');
const feedbackElement = document.getElementById('quiz-feedback');
const questionCounterElement = document.getElementById('question-counter');

// Chart instance
let chart;

// Add data to table and chart
form.addEventListener('submit', (e) => {
    e.preventDefault();
    const day = document.getElementById('day').value;
    const weight = parseFloat(document.getElementById('weight').value);
    data.push({ day, weight });

    // Update table
    tableBody.insertAdjacentHTML('beforeend', `<tr><td>${day}</td><td>${weight} kg</td></tr>`);
    
    // Update chart
    updateChart();
});

// Update chart
function updateChart() {
    if (chart) chart.destroy();
    chart = new Chart(chartCanvas, {
        type: 'bar',
        data: {
            labels: data.map(d => d.day),
            datasets: [{
                label: 'Avfall (kg)',
                data: data.map(d => d.weight),
                backgroundColor: ['rgba(255, 206, 86, 0.8)', 'rgba(75, 192, 192, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(153, 102, 255, 0.8)', 'rgba(255, 99, 132, 0.8)', 'rgba(255, 159, 64, 0.8)', 'rgba(255, 99, 255, 0.8)'],
                borderColor: ['rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 99, 132, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255, 99, 255, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: { ticks: { color: 'white' }, grid: { color: 'rgba(255, 255, 255, 0.2)' } },
                y: { beginAtZero: true, ticks: { color: 'white' }, grid: { color: 'rgba(255, 255, 255, 0.2)' } }
            }
        }
    });
}

// Quiz data
const quizQuestions = [
    { item: 'Plastflaske', correct: 'Plast' }, { item: 'Avis', correct: 'Papir' },
    { item: 'Matrester', correct: 'Restavfall' }, { item: 'Metallboks', correct: 'Metal' },
    { item: 'Pizzakartong', correct: 'Papir' }, { item: 'Drikkekartong', correct: 'Papir' },
    { item: 'Lyspære', correct: 'Glass' }, { item: 'Batteri', correct: 'Farlig Avfall' },
    { item: 'Kjøttbein', correct: 'Restavfall' }, { item: 'Kulepenn', correct: 'Restavfall' },
    { item: 'Kaffefilter', correct: 'Restavfall' }, { item: 'Sugerør', correct: 'Plast' },
    { item: 'Glassflaske', correct: 'Glass' }, { item: 'Syltetøyglass', correct: 'Glass' },
    { item: 'Melkekartong', correct: 'Papir' }, { item: 'Aluminiumsfolie', correct: 'Metal' },
    { item: 'Mobiltelefon', correct: 'Elektrisk avfall' }, { item: 'Fyrstikker', correct: 'Restavfall' },
    { item: 'Blomsterjord', correct: 'Restavfall' }, { item: 'Tannbørste', correct: 'Plast' },
    { item: 'Tomatboks', correct: 'Metal' }, { item: 'Bok', correct: 'Papir' },
    { item: 'Knust tallerken', correct: 'Restavfall' }, { item: 'CD-plate', correct: 'Restavfall' },
    { item: 'Malingsspann', correct: 'Metal' },
];

// Shuffle questions and initialize
let shuffledQuestions = [...quizQuestions].sort(() => Math.random() - 0.5);
let currentQuestionIndex = 0;
let score = 0;

// Load quiz question
function loadQuizQuestion() {
    if (currentQuestionIndex >= shuffledQuestions.length) {
        questionElement.textContent = `Du har fullført quizen! Du fikk ${score} av ${shuffledQuestions.length} poeng.`;
        feedbackElement.textContent = '';
        quizButtons.forEach(button => button.style.display = 'none');
        questionCounterElement.textContent = '';
        return;
    }

    const { item } = shuffledQuestions[currentQuestionIndex];
    questionElement.textContent = `Hvor skal du sortere ${item}?`;
    feedbackElement.textContent = '';
    questionCounterElement.textContent = `Spørsmål ${currentQuestionIndex + 1} av ${shuffledQuestions.length}`;
}

// Check answer
quizButtons.forEach(button => {
    button.addEventListener('click', () => {
        const userAnswer = button.getAttribute('data-answer');
        const correctAnswer = shuffledQuestions[currentQuestionIndex].correct;
        feedbackElement.textContent = userAnswer === correctAnswer ? 'Riktig!' : `Feil. Riktig svar er: ${correctAnswer}.`;
        feedbackElement.style.color = userAnswer === correctAnswer ? 'green' : 'red';
        score += userAnswer === correctAnswer ? 1 : 0;

        setTimeout(() => {
            currentQuestionIndex++;
            loadQuizQuestion();
        }, 1000);
    });
});

// Initialize quiz
loadQuizQuestion();
