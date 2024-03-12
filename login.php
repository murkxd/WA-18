<?php
require_once 'DBD.php';

session_start();

function validateCredentials($username, $password) {
    $db = DBC::getInstance()->getConnection();

    $query = "SELECT * FROM User WHERE username = ? AND password = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (validateCredentials($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.html?error=1");
        exit;
    }
}
?>