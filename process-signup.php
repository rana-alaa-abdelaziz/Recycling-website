<?php
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password )
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                $_POST["name"],
                $_POST["email"],
                $password_hash);
                
if ($stmt->execute()) {

    header("location: signup-success.html"); //open other page  echo sign up succes
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) { //error 1062
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}



?>