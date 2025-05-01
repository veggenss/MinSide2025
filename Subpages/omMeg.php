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
    <title>Om Meg</title>
    <link rel="stylesheet" href="../CSS/omMegStyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
</head>
<body>
    
<section class="about">
    <div class="about-con">
        <div class="about-text">
            <h1>Meg</h1>
            <p>Hei, mitt navn er Viggo og jeg går på Amalie Skram Vidergående skole. Der går jeg Informasjonsteknologi og Medieproduksjons linjen (IM).</p>
        </div>
        <img src="../pictures/Amalie vgs.png" alt="skole-img">
    </div>
    <div class="about-con">
        <div class="about-text">
            <h1>Fritid</h1>
            <p>I fritiden liker jeg å gå turer ute som oftest i regnet, det er ikke like deprimerende som det høres ut ok. Jeg er også sammen med venner men som oftest ser vi hverandre på skolen. Annet en det så er det mest spilling på PC som alle andre.</p>
        </div>
        <img src="../pictures/Osu!_Logo_2016.svg.png" alt="Fritid-img" style="max-width: 35%;">
    </div>
    <div class="about-con">
        <div class="about-text">
            <h1>Utdanning</h1>
            <p></p>
        </div>
        <img src="" alt="">
    </div>

</section>

</body>
</html>
