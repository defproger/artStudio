<?php
$botToken = 'your_bot_token';
if (isset($_POST['email']) && isset($_POST['name'])) {
    $data = [
        'email' => $_POST['email'],
        'message' => $_POST['message'],
    ];
    //подготавливаем данные для отправки
    $data = http_build_query($data);
    //отправляем данные в телеграмм
    file_get_contents("https://api.telegram.org/bot{$botToken}/sendMessage?chat_id=1&text={$data}");
    //выводим сообщение об успешной отправке
    echo 'Data sent';
} else {
    //выводим сообщение об ошибке
    echo 'Data not sent';
}
