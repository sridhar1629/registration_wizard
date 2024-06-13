<?php
$host = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "registration_wizard";

$connection = new mysqli($host, $dbUser, $dbPassword, $dbName);

if ($connection->connect_error) {
    die("Failed to connect to the database: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userName = $connection->real_escape_string($_POST['name']);
    $userEmail = $connection->real_escape_string($_POST['email']);
    $userPassword = password_hash($connection->real_escape_string($_POST['password']), PASSWORD_BCRYPT);
    $userQualification = $connection->real_escape_string($_POST['educational_qualification']);
    $userIndustry = $connection->real_escape_string($_POST['industry']);

    $insertQuery = "INSERT INTO users (name, email, password, educational_qualification, industry)
                    VALUES ('$userName', '$userEmail', '$userPassword', '$userQualification', '$userIndustry')";

    if ($connection->query($insertQuery) === TRUE) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $connection->error;
    }

    $connection->close();
}
?>
