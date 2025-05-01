<?php
  include("include/dbh.inc.php");
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Viggo's Nettside</title>
  <link rel="stylesheet" href="CSS/homeStyles.css" />
  <!-- Google Fonts: Poppins with various weights -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
    rel="stylesheet" />
</head>

<body>
  <!-- Header section with introduction -->
  <section class="head">
    <div class="container">
      <div class="head-content">
        <p>Viggo Weissmuller</p>
        <h1>
          Her finner du info om meg <br />
          og hva jeg har jobbet med
        </h1>
      </div>
    </div>
  </section>

  <!--Comment Section-->
  <section class="giscus-comments">
    <div class="giscus-wrapper">
      <script src="https://giscus.app/client.js"
          data-repo="veggenss/MinSide2025"
          data-repo-id="R_kgDOOh61YQ"
          data-category="General"
          data-category-id="DIC_kwDOOh61Yc4CppFL"
          data-mapping="pathname"
          data-strict="1"
          data-reactions-enabled="0"
          data-emit-metadata="0"
          data-input-position="top"
          data-theme="dark_dimmed"
          data-lang="en"
          crossorigin="anonymous"
          async>
      </script>
    </div>
  </section>
  <script src="Min_Side/JS/indexScript.js"></script>
</body>
</html>