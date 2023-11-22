<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App | Forgot Password</title>

    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <form action="index.php" method="post">

            <h1>Forgot Password</h1>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="New Password" required>
                <i class='bx bxs-lock-alt'></i>  
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="New Password Again" required>
                <i class='bx bxs-lock-alt'></i>  
            </div>
            
            <button type="submit" class="btn">Change password</button>

            <div class="register-link">
                <p>Don't have an account? <a href="./register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>