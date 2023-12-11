<?php
    /* error_reporting(E_ALL);
    ini_set('display_errors', 1); */
    
    require_once('../database.php');
    require_once('../functions.php');

    $message = null;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kontrola, či existuje položka "username" v poli $_POST
        // Controlling, if "username" is existing in array $_POST
        $username = isset($_POST["username"]) ? $_POST["username"] : "";

        // Kontrola, či existuje položka "password" v poli $_POST
        // Controlling, if "password" is existing in array $_POST
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
    
        if (isset($_POST["register"])) {
            // Pridá kontrolu, ak je pole email vo formulári
            // Add control, if email array is in form
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $message = registerUser($conn, $username, $password, $email);

        } else {
            $message = loginUser($conn, $username, $password);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App | Register</title>

    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <form action="register.php" method="post">

            <h1>Register</h1>

            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>  
            </div>

            <!-- this line is only for register authentification, it knows if we are currently in register.php or in index.php file -->
            <!-- Tento riadok kódu slúži len na overenie či sa práve nachádzame v register.php súbore alebo v index.php súbore -->
            <input type="hidden" name="register" value="1">

            <button type="submit" class="btn">Register</button>

            <span><?php echo $message;?></span>

            <div class="register-link">
                <p>Already have an account? <a href="../index.php">Sign in</a></p>
            </div>
        </form>
    </div>


    
    
</body>
</html>