<?php
  include("../dbh.inc.php");
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
    <link rel="stylesheet" href="../CSS/ProsjekterStyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">

</head>
<body>
<!-- Header section with title -->
<section class="head">
    <div class="container">
         <div class="head-content">
             <p>Prosjekter</p>
             <h1>Ting jeg har jobbet med</h1>
        </div>
    </div>
</section>

<!-- Project containers 1 to 3 (Top section) -->
<section class="Prosjekt-Top">
    <div class="Project-box">
        <div class="Project-content">
            <div class="picture">
                <a href="../home.php" target="_blank"><img src="../pictures/minSideBilde.png" alt="Screenshot of Website"></a>
            </div>  
            <h1>Min Side</h1>
            <p>Siden du er på nå! Det er prosjektet vi jobber med i Konseptutvikling og Programmering med Bent</p>
        </div>
    </div>

    <!-- Project 2: English Tourist Site -->
    <div class="Project-box">
        <div class="Project-content">
            <div class="picture">
                <a href="../Engelsk Nettside/index.html" target="_blank"><img src="../pictures/Engelsk_Bilde.png" alt="Screenshot of Website"></a>
            </div>     
            <h1>English Tourist Site</h1>
            <p>Del av Engelsk oppgave vi fikk. Den er en Turist nettside om California. vi hadde 0 tid på den. WIP</p>
        </div>
    </div>

    <!-- Project 3: Photo Series -->
    <div class="Project-box">
        <div class="Project-content">
            <a href="FotoSerie.php"><img src="/VG12025Nettside/pictures/Fotoserie/IMG_1068.jpg" alt="Screenshot of Website"></a>
            <h1>Foto Serie</h1>
            <p>Oppgave jeg hadde i historiefortelling</p>
        </div>
    </div>
</section>



<section class="Prosjekt-Bottom">
    <div class="Project-box">
        <div class="Project-content">
            <a href="../TverfageligProsjekt/index.html"><img src="../pictures/Tverfagelig.png" alt="Empty"></a>
            <h1>Tverfagelig Prosjekt</h1>
            <p>Side om kildesortering</p>
        </div>
    </div>

<!-- Bottom section with additional project slots (currently commented out) -->
 <!--
    <div class="Project-box">
        <div class="Project-content">
            <a href="#"><img src="" alt="Empty"></a>
            <h1></h1>
            <p></p>
        </div>
    </div>

    <div class="Project-box">
        <div class="Project-content">
            <a href="#"><img src="" alt="Empty"></a>
            <h1></h1>
            <p></p>
        </div>
    </div>
</section>
-->

</section>
</body>
</html>