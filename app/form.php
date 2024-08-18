<?php
$botToken = 'your_bot_token';
if (isset($_POST['email']) && isset($_POST['name'])) {
    $data = [
        'email' => $_POST['email'],
        'message' => $_POST['message'],
    ];
    $text = "Email: {$data['email']}\nMessage: {$data['message']}";
    //подготавливаем данные для отправки
    $text = http_build_query($data);
    //отправляем данные в телеграмм
    file_get_contents("https://api.telegram.org/bot{$botToken}/sendMessage?chat_id=1&text={$text}");
    //выводим сообщение об успешной отправке
    echo 'Data sent';
} else {
    //выводим сообщение об ошибке
    echo 'Data not sent';
}
