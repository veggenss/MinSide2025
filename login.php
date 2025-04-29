<?php
    include("dbh.inc.php");
    
    $loginError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($username) || empty($password)){
            echo "Fyll ut brukernavn og passord";
        }
        else{
            $sql = "SELECT FROM users WHERE user = '$username'";
            $result = mysqli_query($conn, $sql);
            if($result && mysqli_num_rows($result) > 0){
                $user = mysqli_fetch_assoc($result);
                if(password_verify($password, $user["password"])){
                    header("home.html");
                    exit();
                }
                else{
                    $loginError = "Feil Passord!";
                }
            }
            else{
                $loginError = "Brukernavne finnes ikke!";
            }
        }
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
        <?php if($error001){echo "Error: 001 Could not connect to<br>";}?>
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