<?php
  include("include/dbh.inc.php");
  include("include/navBar.html");

  session_start();
  if(empty($_SESSION["activeSes"])){
    header("location: login.php");
    exit();
  }

  $sql = "SELECT username, register_date FROM users";
  $result = $conn->query($sql); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Viggo Nettside</title>
  <link rel="stylesheet" href="CSS/homeStyles.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
    rel="stylesheet"/>
</head>

<body>

  <section class="head">
    <div class="container">
      <div class="head-content">
        <p>Viggo Weissmuller</p>
        <h1>Her finner du info om meg<br/> og hva jeg har jobbet med</h1>
      </div>
    </div>
  </section>
  <section class="user-section">
    <h2 class="user-list-title">Liste med brukere</h3><br>
    <div class="list-line"></div>
    <div class="User-list">
    
      <ul>
          <?php
          if ($result->num_rows > 0) {

              while($row = $result->fetch_assoc()) {

                $row['register_date'] = preg_replace('/\.\d{6}$/', '', $row['register_date']);
                
                echo "<li>" . "<!--<span id='usnam'>Brukernavn: </span>-->" . htmlspecialchars($row["username"]) . "<span id='regi'>" . "Registrert: " . htmlspecialchars($row["register_date"]) . "</span></li>";
              }
          } 
          else {
            echo "<li>No users found</li>";
          }
          $conn->close();
          ?>
      </ul>
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
</body>
</html>