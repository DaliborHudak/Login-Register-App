<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_server = "localhost:3306";
$db_user = "root";
$db_pass = "password";
$db_name = "customprojectdb";
$conn = "";

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

// only uncomment for testing purposes

/* if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully"; */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Zpracování formuláře
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($_POST["register"])) {
        // Provádíte kód pro registraci, protože byl odeslán skrytý vstup
        $email = $_POST["email"];

        // Kontrola, zda uživatel již existuje
        $check_existing_user_sql = "SELECT * FROM my_users WHERE username = '$username'";
        $existing_user_result = $conn->query($check_existing_user_sql);

        if ($existing_user_result->num_rows > 0) {
            // Uživatel již existuje
            echo "Not registered. User already exists.";
        } else {
            // Uživatel neexistuje, provede se registrace
            $insert_user_sql = "INSERT INTO my_users (username, password, email) VALUES ('$username', '$password', '$email')";

            if ($conn->query($insert_user_sql) === TRUE) {
                $last_inserted_id = $conn->insert_id;
                echo "User registered successfully. ID: $last_inserted_id";
            } else {
                echo "Error: " . $insert_user_sql . "<br>" . $conn->error;
            }
        }
    } else {
        // Provádíte kód pro přihlášení, protože nebyl odeslán skrytý vstup
        // Kontrola, zda uživatel již existuje
        $check_user_sql = "SELECT * FROM my_users WHERE username = '$username'";
        $result = $conn->query($check_user_sql);

        if ($result->num_rows > 0) {
            // Uživatel již existuje, ověřte heslo
            $user_data = $result->fetch_assoc();
            if ($user_data['password'] == $password) {
                // Heslo je správné, provádíte přihlášení
                echo "User logged in successfully.";
            } else {
                // Heslo je nesprávné
                echo "Wrong password.";
            }
        } else {
            // Uživatel neexistuje
            echo "User does not exist.";
        }
    }

    // Uzavření spojení s databází
    $conn->close();
}
?>