<?php
include("dbh.inc.php");


$registerd = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    /*
        if(empty($username) && empty($password)){
            echo "Skriv inn et gyldig brukernavn og passord <br>";
        }
        elseif(empty($username)){
            echo "Skriv inn et gyldig brukernavn <br>";
        }
        elseif(empty($password)){
            echo "Skriv inn et gylding passord <br>";
        }
        else{
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            $registerd = 1;
        }*/

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        header('Location: home.html');
        echo "Registrering av bruker vellykket.";
        exit();
    } else {
        $error = "Brukernavn finnes allerede i databasen";
    }
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="register-form">
        <?php if ($error001) {
            echo "Error: 001 Could not connect to<br>";
        } ?>
        <h2>Registrering</h2>
        <p>Du må registrere deg for å bruke nettsiden ; )</p>
        <section class="register-field">

            <div class="username">
                <label>Username</label><br>
                <input type="text" placeholder="username" name="username" required>
            </div>

            <div class="password">
                <label>Password</label><br>
                <input type="password" placeholder="password" name="password" required>
            </div>

            <button type="submit" value="Register">Registrer deg</button><br>
            <?php if ($registerd) {
                echo "Du er nå registrert! <br>";
                echo "<p>Trykk <a href='login.php'>Her</a> for å logge inn</p>";
            } ?>

            <?php
            /* Select queries return a resultset */
            $result = mysqli_query($conn, "SELECT * FROM users");
            printf("Select returned %d rows.\n", mysqli_num_rows($result));
            ?>
        </section>
    </form>
</body>

</html>
<?php
mysqli_close($conn);
?>