<?php
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_data = [
        'First Name' => htmlspecialchars($_POST['first_name']),
        'Last Name' => htmlspecialchars($_POST['last_name']),
        'Phone Number' => htmlspecialchars($_POST['phone_number']),
        'DOB' => htmlspecialchars($_POST['dob']),
        'Zip Code' => htmlspecialchars($_POST['zip_code']),
        'Consent' => isset($_POST['consent']) ? 'Yes' : 'No',
        'Source URL' => htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'Direct')
    ];

    $url = 'https://script.google.com/macros/s/AKfycbwUMzggxXGVCLzlFCY5RekrkxVMJURT77GIbnvE5tplpyefAll_bLE_xMTvzLb8y2_NoQ/exec';
    $postData = http_build_query($form_data);

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => $postData,
        ],
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result !== FALSE) {
        $success = true;
    } else {
        error_log('Failed to submit data to Google Sheets');
    }
}
?>