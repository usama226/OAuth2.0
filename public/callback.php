<?php

require '../vendor/autoload.php';

use App\OAuth\GoogleAuth;

session_start();

if (!isset($_GET['code'], $_GET['state']) || $_GET['state'] !== $_SESSION['state']) {
    die('Invalid state or no code received.');
}

$googleAuth = new GoogleAuth();
$accessToken = $googleAuth->getAccessToken($_GET['code']);

if (!$accessToken) {
    die('Failed to get access token.');
}

$userInfo = $googleAuth->getUserInfo($accessToken);

if (!$userInfo) {
    die('Failed to fetch user information.');
}

// Store user data in session
$_SESSION['user'] = $userInfo;

// Redirect to dashboard
header('Location: dashboard.php');
exit();
