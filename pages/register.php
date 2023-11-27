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
        <form action="../index.php" method="post">

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
            <input type="hidden" name="register" value="1">

            <button type="submit" class="btn">Register</button>
            <!-- <a href="../reg-redirect.php">Register</a> -->

            <div class="register-link">
                <p>Already have an account? <a href="../index.php">Sign in</a></p>
            </div>
        </form>
    </div>


    
    
</body>
</html>