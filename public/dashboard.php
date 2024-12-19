<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// $user = $_SESSION['user'];

include 'partials/navbar.php';
?>


<div class="container mt-5">
    <h1 class="text-center">Welcome to your Dashboard</h1>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    </div>
</div>

<?php include 'partials/footer.php'; ?>