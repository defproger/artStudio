<?php
require_once 'init.php';
if (isset($_POST['email']) && isset($_POST['name'])) {
    $data = [
        'email' => $_POST['email'],
        'message' => $_POST['message'],
    ];
    $text = "Email: {$_POST['email']}\nMessage: {$_POST['message']}";
    $text = urlencode($text);
    file_get_contents("https://api.telegram.org/bot{$botToken}/sendMessage?chat_id=1&text={$text}");
    echo 'Data sent';
} else {
    echo 'Data not sent';
}
