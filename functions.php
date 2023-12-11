<?php
function registerUser($conn, $username, $password, $email) {

    // Verification of the existence of the e-mail in the form
    // Overenie existencie e-mailu vo formulári
    if (empty($email)) {
        return "E-mail is missing.";
    }

    // Verification, if all required fields are filled
    // Overenie, či sú vyplnené všetky povinné polia
    if (empty($username) || empty($password) || empty($email)) {
        return "All fields are required.";
    }

    // Validation controll for e-mail adress
    // Kontrola validity e-mailové adresy
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid e-mail format.";
    }

    // SQL command to check if a user with the given name already exists
    // SQL príkaz pre kontrolu, či užívateľ s daným menom už existuje
    $check_existing_user_sql = "SELECT * FROM my_users WHERE username = '$username'";
    $existing_user_result = $conn->query($check_existing_user_sql);

    // SQL command to check if given e-mail already exists in database
    // SQL príkaz pre kontrolu, či už e-mail existuje v databáze
    $check_existing_email_sql = "SELECT * FROM my_users WHERE email = '$email'";
    $existing_email_result = $conn->query($check_existing_email_sql);

    // If user doesn't exist, get an error message
    // Pokud uživatel existuje, vrátíme chybovou zprávu
    if ($existing_user_result->num_rows > 0) {
        return "Not registered. User already exists.";
    } elseif ($existing_email_result->num_rows > 0) {
        return "Not registered. Email is already used.";
    } else {

        // The user does not exist, we will register
        // Užívateľ neexistuje, vykonáme registráciu
        $insert_user_sql = "INSERT INTO my_users (username, password, email) VALUES ('$username', '$password', '$email')";
        
        // If registration will be success
        // Ak registrácia prebehne úspešne
        if ($conn->query($insert_user_sql) === TRUE) {

            // Redirect on reg-redirect.php
            // Presmerovanie na reg-redirect.php
            $path = "http://localhost:8888/customproject/register/reg-redirect.php";
            header("Location: " . $path);
            exit(); // Script sa po presmerovaní automaticky ukončí // Script will end right after redirecting

        } else {
            // If there will be error on user register, we'll get an error message
            // Ak dojde k chybe pri registracií, vrátime chybovú správu
            return "Error: " . $insert_user_sql . "<br>" . $conn->error;
        }
    }
}

// Function for user login
// Funkcia pre prihlásenie užívateľa
function loginUser($conn, $username, $password) {
    
    // SQL command for getting informations about user with specified name
    // SQL príkaz pre získanie informácie o užívatelovi s daným menom
    $check_user_sql = "SELECT * FROM my_users WHERE username = '$username'";
    $result = $conn->query($check_user_sql);

    // If user with name we set already exist
    // Ak užívateľ so zadaným menom už existuje
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();

        // Control if password we set is the same as saved password
        // Kontrola, či zadané heslo odpovedá uloženému heslu
        if ($user_data['password'] == $password) {

            // Redirecting on log-redirect.php
            // Presmerovanie na log-redirect.php
            $path = "http://localhost:8888/customproject/login/log-redirect.php";
            header("Location: " . $path);
            exit(); // Script sa po presmerovaní automaticky ukončí // Script will end right after redirecting
            return "User logged in successfully.";

        } else {
            // If the password does not match, we return an error message
            // Ak je heslo nesprávne, vrátime chybovú správu
            return "Wrong login credentials!";
        }
        
    } else {
        // If user already exist, return error message
        // Ak uživateľ neexistuje, vrátime chybovú správu
        return "User does not exist.";
    }
}

// redirect function
function redirect($page) {
    header("Location: $page");
    exit();
}
    
?>