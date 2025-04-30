<?php
include("dbh.inc.php");

$loginError = false;
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
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        }

        header('Location: home.html');
        exit();
    } else {
        $error = "Ugyldig brukernavn eller passord";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/loginStyle.css">
    <title>Logg inn</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login-form">
        <?php if ($error001) {
            echo "Error: 001 Could not connect to<br>";
        } ?>
        <h2>Logg in</h2>
        <p>Du må logge inn for å bruke denne nettsiden</p>
        <section class="register-field">

            <div class="username">
                <label>Brukernavn</label><br>
                <input type="text" placeholder="username" name="username" required>
            </div>

            <div class="password">
                <label>Passord</label><br>
                <input type="password" placeholder="password" name="password" required>
            </div>

            <label for="remember_me"><input type="checkbox" id="remember_me" name="remember_me">Husk meg</label>

            <button type="submit" value="Login">Logg Inn</button><br>

        </section>
    </form>
</body>

</html>

<?php
mysqli_close($conn);
?>