<?php
session_start();

require_once 'DBD.php';

function createUser($username, $password) {
    $db = DBC::getInstance()->getConnection();

    // Check if the username already exists
    $query = "SELECT * FROM User WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return false;
    }

    $query = "INSERT INTO User (username, password) VALUES (?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (createUser($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        header("Location: register.html?error=1");
        exit;
    }
}
?>