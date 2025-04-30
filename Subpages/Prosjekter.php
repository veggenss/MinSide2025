<?php
  include("dbh.inc.php");
  include("include/navBar.html");
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
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">

</head>
<body>
    <nav>
        <ul>
            <li><a href="../home.html">Hjem</a></li>
            <li><a href="Prosjekter.html">Prosjekter</a></li>
            <li><a href="Om Meg.html">Om</a></li>
            <li><a href="JavaScript_feat_Bent.html">JavaScript</a></li>
            <li><a href="log.html">Logg</a></li>
            <li><a href="#">Ressurser/Hjelp</a> 
                <ul class="dropdown">
                    <li><a href="https://www.w3schools.com/html/default.asp" target="_blank">W3schools</a></li>
                    <li><a href="https://www.freecodecamp.org/learn/2022/responsive-web-design/" target="_blank">freeCodeCamp</a></li>
                    <li><a href="https://www.youtube.com/@coding2go" target="_blank">Coding2Go</a></li>
                    <li><a href="bent.html">Bent</a></li>
                </ul>
            </li>
        </ul>
    </nav>

<!-- Header section with title -->
<section class="header">
    <div class="header-box">
         <div class="header-content">
             <h1>Prosjekter jeg har jobbet med!</h1>
        </div>
    </div>
</section>

<!-- Project containers 1 to 3 (Top section) -->
<section class="Prosjekt-Top">
    <div class="Project-box">
        <div class="Project-content">
            <div class="picture">
                <a href="../home.html" target="_blank"><img src="../pictures/Min Side SS.png" alt="Screenshot of Website"></a>
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
            <a href="FotoSerie.html"><img src="../picture/Fotoserie/IMG_1068.jpg" alt="Screenshot of Website"></a>
            <h1>Foto Serie</h1>
            <p>Oppgave jeg hadde i historiefortelling</p>
        </div>
    </div>
</section>



<section class="Prosjekt-Bottom">
    <div class="Project-box">
        <div class="Project-content">
            <a href="../Skjema Side/index.html"><img src="../pictures/Tverfagelig.png" alt="Empty"></a>
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
<!-- Website Outline Comparison Section -->
<section class="outline-section">
    <div class="outline-box">
        <div class="outline-content">
            <h1>Nettside Planlegging</h1>
            <div class="outline-image">
                <img src="Bilder/Skisse_2.png" alt="Original Website Outline">
            </div>
        </div>
    </div>
</section>

<!-- Footer section with image credits -->
<footer>
    <section class="Footer-box">
        <div class="Footer-content">
            <ul>
                <li>Image by&nbsp;<span class="flatart-link"><a href="https://www.freepik.com/author/freepik" target=_blank>freepik</a></span></li>
            </ul>
        </div>
    </section>
</footer>

</body>
</html>