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
    <title>Foto Serie</title>
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <link rel="stylesheet" href="../CSS/FotoSerie.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">

</head>
<body>
    <!--Video-->
    <div class="Video-Center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/PahdXf6Jzf4?si=TFkdnF-Fe-Zg3g2n" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>

</body>
</html>