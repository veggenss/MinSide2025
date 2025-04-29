<?php
    include("dbh.inc.php");    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/indexStyle.css">
    <title>Register</title>
</head>
<body> 
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="register-form">
        <h2>Register</h2>

        <section class="register-field">

            <div class="username">
                <label>Username</label><br>
                <input type="text" placeholder="username" name="username" required>
            </div>

            <div class="password">
                <label>Password</label><br>
                <input type="password" placeholder="password" name="password" required>
            </div>

            <input type="submit" value="Register">

        </section>

    </form>
</body>
</html

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        echo "aergaergwserthrse";
        if(empty($username) && empty($password)){
            echo "Please enter a valid username and password <br>";
        }
        elseif(empty($username)){
            echo "Please enter a valid username <br>";
        }
        elseif(empty($password)){
            echo "Please enter a valid password <br>";
        }
        else{
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user, password) 
                    VALUES ('$username', '$hash')";
            echo "youre now registered <br>";
        }
    }


    mysqli_close($conn);
?>