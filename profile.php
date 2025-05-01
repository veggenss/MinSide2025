<?php
  include("dbh.inc.php");
  session_start();

  if(empty($_SESSION["activeSes"])){
    header("location: login.php");
    exit();
  }

  $message = null;
if (isset($_POST['new_username'])) {
  
  $new_username = $conn->real_escape_string($_POST['new_username']);

  $check_sql = "SELECT id FROM users WHERE username = ? AND id != ?";
  $check_stmt = $conn->prepare($check_sql);
  $check_stmt->bind_param("si", $new_username, $_SESSION['user_id']);
  $check_stmt->execute();
  $result = $check_stmt->get_result();

  if ($result->num_rows > 0) {
      $message = "Brukernavnet er allerede i bruk. Prøv et annet.";
  } else {
      // oppdater brukernavnet i databasen
      $sql = "UPDATE users SET username = ? WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("si", $new_username, $_SESSION['user_id']);

      if ($stmt->execute()) {
          $_SESSION['username'] = $new_username;
          $message = "Brukernavn oppdatert.";
      } else {
          $message = "Kunne ikke oppdatere brukernavn :(";
      }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="CSS/profileStyles.css">
  <script src="JS/profileScript.js" defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil</title>
</head>
<body>
  <div class="auth-con">

    <h1>Profil Instillinger</h1><br>
    <?php echo $message?>

    <form action="profile.php" enctype="multipart/form-data" method="post">
      
      <div class="form-group">
        <label>Endre brukernavn</label><br>
        <input type="text" name="new_username" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" required>
      </div>
      
    </form>

    <div class="path">
      <button class="return"><a href="home.php">Tilbake</a></button>
      <button class="logout" onclick="clicked(event)"><a href="logout.php">Logg ut</a></button>
    </div>
  </div>
</body>
</html>