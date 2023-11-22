<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App | Login</title>

    
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <div class="container">
        <form action="index.php" method="post">
            <h1>Login</h1>

            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>  
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" checked>Remember me</label>
                <a href="./pages/forgot_password.php">Forgot password?</a>
            </div>
            
            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="./pages/register.php">Register</a></p>
            </div>
        </form>
    </div>

</body>
</html>

<?php
    /*moj kod*/
    /* echo "{$_POST["username"]} <br>";
    echo "{$_POST["password"]} <br>"; */

    require_once('./database.php'); // Připojení k databázi
    
?>