<?php
function registerUser($conn, $username, $password, $email) {
    // Ověření existence e-mailu ve formuláři
    if (empty($email)) {
        return "E-mail is missing.";
    }

    // Ověření, zda jsou vyplněna všechna povinná pole
    if (empty($username) || empty($password) || empty($email)) {
        return "All fields are required.";
    }

    // Kontrola validity e-mailové adresy
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid e-mail format.";
    }

    // SQL dotaz pro kontrolu, zda uživatel s daným jménem již existuje
    $check_existing_user_sql = "SELECT * FROM my_users WHERE username = '$username'";
    $existing_user_result = $conn->query($check_existing_user_sql);

    // SQL dotaz pro kontrolu, zda e-mail již existuje v databázi
    $check_existing_email_sql = "SELECT * FROM my_users WHERE email = '$email'";
    $existing_email_result = $conn->query($check_existing_email_sql);

    // Pokud uživatel existuje, vrátíme chybovou zprávu
    if ($existing_user_result->num_rows > 0) {
        return "Not registered. User already exists.";
    } elseif ($existing_email_result->num_rows > 0) {
        return "Not registered. Email is already used.";
    } else {
        // Uživatel neexistuje, provedeme registraci
        $insert_user_sql = "INSERT INTO my_users (username, password, email) VALUES ('$username', '$password', '$email')";
        
        // Pokud registrace proběhne úspěšně
        if ($conn->query($insert_user_sql) === TRUE) {
            // Automatické přihlášení
            loginUser($conn, $username, $password);
            // Přesměrování na reg-redirect.php
            header("Location: register/reg-redirect.php");
            exit(); // Zajištění, že se skript po přesměrování okamžitě ukončí
        } else {
            // Pokud dojde k chybě při registraci, vrátíme chybovou zprávu
            return "Error: " . $insert_user_sql . "<br>" . $conn->error;
        }
    }
}


// Ověření existence e-mailu ve formuláři
/* if (!isset($_POST["email"])) {
    return "E-mail is missing.";
} */

// Ověření, zda jsou vyplněna všechna povinná pole
/* if (empty($username) || empty($password) || empty($email)) {
    return "All fields are required.";
} */

// Funkce pro přihlášení uživatele
function loginUser($conn, $username, $password) {
    // SQL dotaz pro získání informací o uživateli s daným jménem
    $check_user_sql = "SELECT * FROM my_users WHERE username = '$username'";
    $result = $conn->query($check_user_sql);

    // Pokud uživatel s daným jménem existuje
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();

        // Kontrola, zda zadané heslo odpovídá uloženému heslu
        if ($user_data['password'] == $password) {
            // Pokud heslo odpovídá, uživatel je úspěšně přihlášen
            // Přesměrování na log-redirect.php
            header("Location: login/log-redirect.php");
            exit(); // Zajištění, že se skript po přesměrování okamžitě ukončí
            return "User logged in successfully.";
        } else {
            // Pokud heslo nesouhlasí, vrátíme chybovou zprávu
            return "Wrong login credentials!";
        }
    } else {
        // Pokud uživatel neexistuje, vrátíme chybovou zprávu
        return "User does not exist.";
    }
}

// redirect function
function redirect($page) {
    header("Location: $page");
    exit();
}
    
?>