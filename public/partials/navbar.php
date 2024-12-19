<?php
if (!isset($_SESSION)) {
    session_start();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark text-light" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#">OAuth2.0</a>
        <div class="d-flex justify-content-end">
            <?php 
            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user']; // Access user data from session
                echo '<a href="profile.php" class="text-light me-3">Welcome, ' . htmlspecialchars($user['name']) . '!</a>';
                echo '<a href="logout.php" class="btn btn-outline-danger">Logout</a>';
            } else {
                echo '<a href="index.php" class="btn btn-outline-primary">Login</a>';
            }
            ?>
        </div>
    </div>
</nav>
