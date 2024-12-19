<?php

require '../vendor/autoload.php';

use App\OAuth\GoogleAuth;

session_start();

// Generate CSRF state
$_SESSION['state'] = bin2hex(random_bytes(16));

$googleAuth = new GoogleAuth();
$authUrl = $googleAuth->getAuthUrl($_SESSION['state']);

include 'partials/navbar.php';
?>


    <div class="container text-center mt-5">
    <div class="row">
            <div class="col-6 m-auto">
                <div class="card text-center mt-5">
                    <div class="card-header">
                        OAuth2.0
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Sign Up with Google</h5>
                        <p class="card-text">Click the button below to sign up securely using your Google account.</p>
                        <a href="<?= $authUrl ?>" class="btn btn-primary">Sign Up with Google</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'partials/footer.php'; ?>
