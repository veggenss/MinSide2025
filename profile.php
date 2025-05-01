<?php
  include("include/dbh.inc.php");
  session_start();

  if(empty($_SESSION["activeSes"])){
    header("location: login.php");
    exit();
  }

  $message = null;

  //Nytt Brukernavn
  if (isset($_POST['new_username'])) {
  
  $new_username = $conn->real_escape_string($_POST['new_username']);

  $check_sql = "SELECT id FROM users WHERE username = ? AND id != ?";
  $check_stmt = $conn->prepare($check_sql);
  $check_stmt->bind_param("si", $new_username, $_SESSION['user_id']);
  $check_stmt->execute();
  $result = $check_stmt->get_result();

  if ($result->num_rows > 0) {
      $message = "Brukernavnet finnes allerede, prøv et annet.";
  } else {
      // oppdater brukernavnet i databasen
      $sql = "UPDATE users SET username = ? WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("si", $new_username, $_SESSION['user_id']);

      if ($stmt->execute()) {
          $_SESSION['username'] = $new_username;
          $message = "Brukernavn er oppdatert.";
      } else {
          $message = "Kunne ikke oppdatere brukernavn.";
      }
  }
  
  }

  //Bruker Sletting
  if (isset($_POST['delete_user'])){
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
      header("Location: logout.php");
      exit();
    }
    else {
      $message = "Kunne ikke slette bruker.";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="CSS/profileStyles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil</title>
</head>
<body>
  <div class="auth-con">

    <h1>Profil Instillinger</h1><br>
    <?php echo $message?>

    <form action="profile.php" method="post">
      
      <div class="form-group">
        <label>Endre brukernavn</label><br>
        <input type="text" name="new_username" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" required><br><br>
      </div>
      
    </form>
    <form method="post" action="profile.php" onsubmit="return confirm('Er du sikker på at du vil slette brukeren din?');">
      <button type="submit" class="deleteUser" name="delete_user">Slett Bruker</button><br><br><br>
    </form>
    <h3 class="lineText">Andre</h3>
    <div class="line"></div>
    <div class="path">
      <button class="return"><a href="home.php">Tilbake</a></button>
      <button class="logOut" onclick="return confirm('Er du sikker på at du vil logge ut?')"><a href="logout.php">Logg ut</a></button>
    </div>
  </div>
</body>
</html>