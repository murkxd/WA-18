<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Data</title>
</head>
<body>

<?php include 'header.html'; ?>

<div class="container">
    <h2>User Data</h2>
    <p>Display user data here, fetched from the server.</p>
    <!-- Table to display data -->
</div>

<?php include 'footer.html'; ?>

</body>
</html>