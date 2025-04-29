<?php
    include("dbh.inc.php");    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="register-form">
        <h2>Logg in</h2>
        <section class="register-field">

            <div class="username">
                <label>Username</label><br>
                <input type="text" placeholder="username" name="username" required>
            </div>

            <div class="password">
                <label>Password</label><br>
                <input type="password" placeholder="password" name="password" required>
            </div>

            <label for="remember_me"><input type="checkbox" id="remember_me" name="remember_me">Husk meg</label>

        </section>
    </form>
</body>
</html>

<?php

?>