<?php
require_once 'init.php';
if (isset($_POST['email']) && isset($_POST['message'])) {
    $data = [
        'email' => $_POST['email'],
        'message' => $_POST['message'],
    ];
    $text = "Email: {$_POST['email']}\nMessage: {$_POST['message']}";
    $text = urlencode($text);
    foreach ($chatIds as $chatId) {
        file_get_contents("https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chatId}&text={$text}");
    }
    echo 'Data sent';
} else {
    echo 'Data not sent';
}
