<?php
    include("dbh.inc.php");  


    $registerd = null;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        
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
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user, password) VALUES ('$username', '$hash')";
            $registerd = 1;
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
        <?php if($error001){echo "Error: 001 Could not connect to<br>";}?>
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
            <?php if($registerd){echo "Du er nå registrert! <br>"; echo "<p>Trykk <a href='login.php'>Her</a> for å logge inn</p>";}?>
            

        </section>
    </form>
</body>
</html>
<?php
    mysqli_close($conn);
?>