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
    <title>Logg</title>
    <link rel="stylesheet" href="../CSS/logStyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="">
    <script src="/VG12025Nettside/JS/log.js" defer></script>
</head>
<body>
    
    <!-- Search Bar -->
    <header class="search-bar">
        <div class="search-container">
            <input type="text" id="search" placeholder="Skriv i Søkefelte..."> 
    </header>

    <!-- Log Section -->
    <section class="logs" id="logSection">
        <div class="log">
            <h3>Theme, Spill og animasjoner</h3>
            <h6>Mandag - 06/01/2025</h6>
            <p>Gjorde theme til JavaScript Underside det same som Om og Logg. La også til små animasjoner i Prosjekter for ekstra responsivitet. Etter det la jeg til Stein saks papir spill i JavaScript og er ganske fornøyd med UIen</p>
        </div>

        <div class="log">
            <h3>Side Vurdering og diverse</h3>
            <h6>Onsdag - 18/12/2024</h6>
            <p>Vurderte med-elev sinn side.</p>
        </div>

        <div class="log">
            <h3>Stiler</h3>
            <h6>Onsdag - 11/12/2024</h6>
            <p>Diverse styling på log siden</p>
        </div>

        <div class="log">
            <h3>Filtere</h3>
            <h6>Mandag - 09/12/2024</h6>
            <p>La til måndes filter ved siden av søkefeltet og det funker veldig bra. Den søker etter ID på elementene som sier hvilken måned de er.</p>
        </div>

        <div class="log">
            <h3>Oppretting av logg</h3>
            <h6>Fredag - 06/12/2024</h6>
            <p>Er ganske seint ute men fikk endelig lagd logg. Endret bakgrunn på "Om" Siden til å være den samme som på "Prosjekter". Lagde disse log konteinerene og et søkefelt som faktisk funker og er live. Det funket ikke helt til å begynne med fordi JS filen bare ble ikke tilkoblet riktig men jeg flytet script scr="" fra bunnen av body til head og da fungerte det.</p>
        </div>

        <div class="log">
            <h3>Intergrerte nettside med PHP bruker inlogging</h3>
            <h6>Wednesday 30/04/2025</h6>
            <p>Etter å ha opprettet database og brukt php for kommunikasjon har jeg reintegrert nettsiden med dette systemet. Alt er på en ny repo siden jeg kjører databasen med XAMPP og da må den være i en annen fil en den var før.</p>
        </div>
    </section>
</body>
</html>
