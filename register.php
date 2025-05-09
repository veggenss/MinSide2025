<?php
include("include/dbh.inc.php");
$registerd = null;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /*if (preg_match('/[a-zA-Z][0-9]/',$_POST['password'])){
        if(preg_match('/{8,}/', $_POST['password'])){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
    }
    else{
        $error = "Passord skal ha minst 1 tegn og tall";
    }*/
    if(!preg_match('/^.{4,}$/', $_POST['username'])){
        $error = "Brukernvnet må være minst 4 siffer";
    }
    else{
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        if(!preg_match('/^.{5,}$/', $_POST['password'])){
            $error = "Passordet må være minst 5 siffer";
        }
        elseif(!preg_match('/[a-zA-Z][0-9]/', $_POST['password'])){
            $error = "Passordet må ha minst 1 tegn og 1 tall";
        }
        else{
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // Username doesn't exist, proceed to insert
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $password);
            
            if ($stmt->execute()) {
                $registerd = true;
            } 
            else {
                $error = "Noe gikk galt. Vennligst prøv igjen.";
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/registerStyles.css">
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