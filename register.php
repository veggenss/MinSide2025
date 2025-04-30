<?php
include("dbh.inc.php");


$registerd = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username already exists
    $checkSql = "SELECT id FROM users WHERE username = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $checkStmt->store_result();


    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($checkStmt->num_rows > 0) {
        $error = "Brukernavnet er allerede i bruk.";
    } else {
        // Username doesn't exist, proceed to insert
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            $registerd = true;
        } else {
            $error = "Noe gikk galt. Vennligst prøv igjen.";
        }
        $stmt->close();
    }

    $checkStmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/registerStyle.css">
    <title>Registrer</title>
</head>

<body>
    <div class="auth-con">
            <h2>Registrering</h2>
            <p>Du må registrere deg for å bruke nettsiden</p>
            <?php if (isset($error)):?>
            <div class="error"><?php echo "{$error}<br>"; ?></div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="register-form">
  
                <div class="username">
                    <label>Username</label><br>
                    <input type="text" placeholder="username" name="username" required>
                </div>

                <div class="password">
                    <label>Password</label><br>
                    <input type="password" placeholder="password" name="password" required>
                </div>

                <button type="submit" value="Register" class="submit">Registrer deg</button><br>
                <?php if ($registerd):?>
                    <div class="registerd">Du er nå registrert!</div>
                <?php endif; ?> <br>

                <label class="loginReminder">Log inn <a href="login.php">her</a> hvis du har bruker</label>
                
        </form>
    </div>
</body>

</html>
<?php
mysqli_close($conn);
?>