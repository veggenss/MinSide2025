<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Viggo's Nettside</title>

  <!-- External CSS files for navigation and general styles -->
  <link rel="stylesheet" href="CSS/nav-bar.css" />
  <link rel="stylesheet" href="CSS/homeStyles.css" />
  <!-- Google Fonts: Poppins with various weights -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
    rel="stylesheet" />
</head>

<body>
  <!-- Navigation bar with dropdown menus -->
  <nav>
    <ul>
      <li><a href="home.html">Hjem</a></li>
      <li><a href="Subpages/Prosjekter.html">Prosjekter</a></li>
      <li><a href="Subpages/Om Meg.html">Om</a></li>
      <li><a href="Subpages/JavaScript_feat_Bent.html">JavaScript</a></li>
      <li><a href="Subpages/log.html">Logg</a></li>
      <li>
        <a href="#">Ressurser/Hjelp</a>
        <ul class="dropdown">
          <li>
            <a href="https://www.w3schools.com/html/default.asp" target="_blank">W3schools</a>
          </li>
          <li>
            <a href="https://www.freecodecamp.org/learn/2022/responsive-web-design/" target="_blank">freeCodeCamp</a>
          </li>
          <li>
            <a href="https://www.youtube.com/@coding2go" target="_blank">Coding2Go</a>
          </li>
          <li>
            <a href="Subpages/bent.html" target="_blank">Bent</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>

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
          data-strict="0"
          data-reactions-enabled="1"
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