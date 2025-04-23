<?php
session_start();
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);

// Redirect HTTP to HTTPS
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
  exit();
}

// Secure Headers
$nonce = uniqid();
header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: no-referrer-when-downgrade");
header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
header("Content-Security-Policy: 
  default-src 'self'; 
  script-src 'self' 'nonce-{$nonce}' https://www.googletagmanager.com https://www.google.com https://trackdrive.net https://www.gstatic.com https://connect.facebook.net https://cdn.inspectlet.com https://www.clarity.ms; 
  style-src 'self' 'nonce-{$nonce}'; 
  connect-src 'self' https://api.trackdrive.com https://www.google.com https://www.clarity.ms https://cdn.inspectlet.com; 
  frame-src https://www.google.com https://www.gstatic.com; 
  object-src 'none'; 
  img-src 'self' data:;
");

$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['csrf_token'], $_SESSION['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {

    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $phone = htmlspecialchars(trim($_POST['phone_number']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $zip = htmlspecialchars(trim($_POST['zip_code']));
    $consent = isset($_POST['consent']) ? 'Yes' : 'No';
    $source_url = htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'Direct');

    if (!preg_match('/^\d{5}$/', $zip)) {
        die('Invalid Zip Code');
    }

    Optional: // Add reCAPTCHA validation here
    $recaptcha_secret = '6LcCISIrAAAAAHI96biuyIB-P_umJePB4RLwB24a';
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=" . $_POST['g-recaptcha-response']);
    $responseKeys = json_decode($response, true);
    if (!$responseKeys["success"]) {
        die('reCAPTCHA verification failed.');
    }

    $postData = http_build_query([
        'First Name' => $first_name,
        'Last Name' => $last_name,
        'Phone Number' => $phone,
        'DOB' => $dob,
        'Zip Code' => $zip,
        'Consent' => $consent,
        'Source URL' => $source_url
    ]);

    $url = 'https://script.google.com/macros/s/AKfycbwUMzggxXGVCLzlFCY5RekrkxVMJURT77GIbnvE5tplpyefAll_bLE_xMTvzLb8y2_NoQ/exec';

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded']
    ]);

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($result !== false && $httpCode === 200) {
        $success = true;
    } else {
        error_log('Form submission failed. Response: ' . $result);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF failed
    die('Unauthorized request. Token mismatch.');
}

// Generate new token
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>