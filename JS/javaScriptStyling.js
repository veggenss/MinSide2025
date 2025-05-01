/*Java Script med bent*/




//doxing function
document.addEventListener("DOMContentLoaded", function() {
    // Fetch the IP address from the API
    fetch("https://api.ipify.org?format=json")
        .then(response => response.json())
        .then(data => {
            // Display the IP address on the screen
            document.getElementById("ip-address").textContent = data.ip;
        })
        .catch(error => {
            console.error("Error fetching IP address:", error);
        });
});


//JS underside - Task list
document.getElementById("addTaskButton").addEventListener("click", addTask);
document.getElementById("removeTaskButton").addEventListener("click", removeTask);


function addTask(){

    let task = document.getElementById("taskInput").value;
    let listItem = document.createElement("li");
    listItem.textContent = task;
    if (task === ""){
        return;
    }
    document.getElementById("taskList").appendChild(listItem);
    document.getElementById("taskInput").value = "";

}



function removeTask(){

    let task = document.getElementById("taskInput").value;
    let taskList = document.getElementById("taskList");
    let listItems = taskList.getElementsByTagName("li");

    for (let i = 0; i < listItems.length; i++){
        if (listItems[i].textContent === task){
            taskList.removeChild(listItems[i]);
            document.getElementById("taskInput").value = "";
            return;
        }
    }
}


//JS underside - Reverse input
document.getElementById("revButton").addEventListener("click", reverseInput);
    
function reverseInput() {
    let inputBox = document.getElementById("inputRev");
    let inputValue = inputBox.value;
    let reversedText = inputValue.split('').reverse().join('');
    
    inputBox.value = reversedText;
}



// Stein Paper Scissors Game
const gameChoices = ["Stein", "Papir", "Saks"];
let playerScore = 0;
let computerScore = 0;


//Simulates a round of Stein Papir scissors and calculates the resulting score 
function playRPS(playerChoice) {
    const computerChoice = gameChoices[Math.floor(Math.random() * 3)];
    let result;

    if (playerChoice === computerChoice) {
        result = "Uavgjort!";
    } else if (
        (playerChoice === "Stein" && computerChoice === "Saks") || (playerChoice === "Papir" && computerChoice === "Stein") || (playerChoice === "Saks" && computerChoice === "Papir")
    ) {
        result = "Du Vant :D";
        playerScore++;
    } else {
        result = "Robot Vant :(";
        computerScore++;
    }

    updateGameUI(playerChoice, computerChoice, result);
}
//Updates the UI
function updateGameUI(playerChoice, computerChoice, result) {
    document.getElementById('player-choice').textContent = playerChoice;
    document.getElementById('computer-choice').textContent = computerChoice;
    document.getElementById('game-result').textContent = result;
    document.getElementById('player-score').textContent = playerScore;
    document.getElementById('computer-score').textContent = computerScore;
}

function resetGame() {
    playerScore = 0;
    computerScore = 0;
    updateGameUI('-', '-', 'Velg ditt neste trekk');
}

document.cookie = "username=spyware; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";




