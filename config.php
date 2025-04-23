<?php
session_start();
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