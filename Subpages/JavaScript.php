<?php
  include("../include/dbh.inc.php");
  include("../include/navBar.html");
  session_start();
  if(empty($_SESSION["activeSes"])){
    header("location: login.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prosjekter</title>
    <link rel="stylesheet" href="../CSS/JavaScriptStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <script src="../JS/JavaScript.js" defer></script>
</head>
<body>

    <!-- JavaScript Input Section -->
    <section class="JS-Input">
        <div class="box-pos">
            <div class="box-frame">
                <h1>Oppgave Liste</h1>
                <div class="box-ui-content">
                    <input type="text" id="taskInput" placeholder="Skriv en ny oppgave">
                    <div class="button-container">
                        <button id="addTaskButton">Legg til Oppgave</button>
                        <button id="removeTaskButton">Fjern Oppgave</button>
                    </div>
                </div>
                <div class="box-li-content">
                    <ul id="taskList"></ul>
                </div>
            </div>
        </div>

        <!--Rock Paper Scissors-->
        <div class="box-pos">
            <div class="box-frame">
                <h1>Stein Saks Papir</h1>
                <div class="game-container">
                    <div class="score-board">
                        <div class="score">
                            <p>Spiller: <span id="player-score">0</span></p>
                            <p>Robot: <span id="computer-score">0</span></p>
                        </div>
                    </div>
                    
                    <div class="game-status">
                        <p>Spiller Valgte: <span id="player-choice">-</span></p>
                        <p>Robot Valgte: <span id="computer-choice">-</span></p>
                        <p class="result" id="game-result">Velg en av kappene!</p>
                    </div>

                    <div class="game-buttons">
                        <button onclick="playRPS('Stein')">
                            <i class="fa-solid fa-hand-fist"></i>
                            <span>Stein</span>
                        </button>
                        <button onclick="playRPS('Saks')">
                            <i class="fa-solid fa-scissors"></i>
                            <span>Saks</span>
                        </button>
                        <button onclick="playRPS('Papir')">
                            <i class="fa-solid fa-toilet-paper"></i>
                            <span>Papir</span>
                        </button>
                    </div>
                    
                    <button class="reset-btn" onclick="resetGame()">Tilbakestill Spill</button>
                </div>
            </div>
        </div>

        <!-- Reverse Text Box -->
        <div class="box-pos">
            <div class="box-frame">
                <h1>Omvendt Tekst!</h1>
                <div class="box-ui-content">
                    <input type="text" id="inputRev" placeholder="Skriv tekst her">
                    <button id="revButton">Kjør!</button>
                </div>
            </div>
        </div>
    </section>

    <p id="ip-address"></p>
</body>
</html>
