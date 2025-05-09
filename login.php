<?php
include("include/dbh.inc.php");
session_start();

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);

    // sjekker brukernavn og passord opp mot databasen
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // verifiser brukernavn og passord og lager session hvis de er riktig
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $message = "Login Sucessfull";
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['activeSes'] = true;
        header('Location: home.php');
        exit();
        }
    else {
        $message = "Ugyldig brukernavn eller passord";
    } 
       
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/loginStyles.css">
    <title>Logg inn</title>
</head>

<body>
    <div class="auth-con">

        <h2>Logg Inn</h2>
        <p>Du må logge inn for å bruke denne nettsiden</p> 

        <?php if (isset($error)):?>
            <div class="error"><?php echo "{$message}<br>"; ?></div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login-form">
            <div class="username">
                <label>Brukernavn</label><br>
                <input type="text" placeholder="username" name="username" required>
            </div>

            <div class="password">
                <label>Passord</label><br>
                <input type="password" placeholder="password" name="password" required>
            </div>

            <label for="remember_me"><input type="checkbox" id="remember_me" name="remember_me">Husk meg</label>

            <button type="submit" value="Login" class="submit">Logg Inn</button><br> <br> <br>    

            <label class="registerReminder">Registrer deg <a href="register.php">her</a> hvis du ikke har bruker</label>
        </form>
    </div>

</body>

</html>

<?php
mysqli_close($conn);
?>