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
                    echo '<a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#" class="text-light me-3">Welcome, ' . htmlspecialchars($user['name']) . '!</a>';
                } else {
                    echo '<a href="index.php" class="btn btn-outline-primary">Login</a>';
                }
                ?>
            </div>
        </div>

        <!-- Modal -->
        <?php

        $user = $_SESSION['user'];
        ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">User Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                        <img src="<?= htmlspecialchars($user['picture']) ?>" alt="Profile Picture" class="rounded-circle mt-3" width="150">
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="logout.php" class="btn btn-outline-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>