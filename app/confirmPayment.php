<?php
ini_set('display_errors', 0);
header('Content-Type: application/json');
require_once 'db.php';
$_POST = json_decode(file_get_contents('php://input'), true) ?? $_POST;

if (empty($_POST['paymentID']) || empty($_POST['paymentHash'])) {
    echo json_encode(["error" => 'invalid data']);
    exit();
}

$payment = query("select p.*, art.name as art_name, art.price as art_price
        from payments p
        left join gallery art on art.id = p.art_id
        where p.id = :id", [
    'id' => $_POST['paymentID'],
]);

if (empty($payment['id']) || $payment['hash'] != $_POST['paymentHash']) {
    echo json_encode(["error" => 'invalid data']);
    exit();
}

$status = $_POST['paymentData']['status'];

db_update('payments', $payment['id'], [
    'status' => $status,
    'payment_data' => json_encode($_POST['paymentData']),
]);

if ($status == 'COMPLETED') {
    db_update('gallery', $payment['art_id'], [
        'status' => 'sold'
    ]);

    $text = "Successful purchase of a painting!!!\n\n
Art: {$payment['art_name']}\n
---------------------------\n
Email: {$payment['email']}\n
Name: {$payment['name']}\n 
Phone: {$payment['phone']}\n 
Address: {$payment['address']}\n 
---------------------------\n
Message: {$payment['message']}
---------------------------\n
---------------------------\n
Other Payment Data:\n
Name of the payer: {$_POST['paymentData']['payer']['name']['given_name']} {$_POST['paymentData']['payer']['name']['surname']}\n
Email of the payer: {$_POST['paymentData']['payer']['email_address']}\n
Address of the payer: {$_POST['paymentData']['purchase_units'][0]['shipping']['address']['address_line_1']}, {$_POST['paymentData']['purchase_units'][0]['shipping']['address']['address_line_2']}, {$_POST['paymentData']['purchase_units'][0]['shipping']['address']['admin_area_2']}, {$_POST['paymentData']['purchase_units'][0]['shipping']['address']['admin_area_1']}, {$_POST['paymentData']['purchase_units'][0]['shipping']['address']['postal_code']}, {$_POST['paymentData']['purchase_units'][0]['shipping']['address']['country_code']}\n
---------------------------\n
Order ID: {$_POST['paymentData']['id']}\n
";
    $text = urlencode($text);
    foreach ($chatIds as $chatId) {
        file_get_contents("https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chatId}&text={$text}");
    }

    echo json_encode(["success" => true]);
} else {

    echo json_encode(["success" => false]);
}

