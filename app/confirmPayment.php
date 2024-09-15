<?php
ini_set('display_errors', 0);
header('Content-Type: application/json');
require_once 'db.php';
$_POST = json_decode(file_get_contents('php://input'), true) ?? $_POST;
///Array
//(
//    [orderID] => 3HU25201MP342221A
//    [payerID] => T5ZFWWJKUK4D2
//    [paymentData] => Array
//        (
//            [id] => 3HU25201MP342221A
//            [intent] => CAPTURE
//            [status] => COMPLETED
//            [purchase_units] => Array
//                (
//                    [0] => Array
//                        (
//                            [reference_id] => default
//                            [amount] => Array
//                                (
//                                    [currency_code] => EUR
//                                    [value] => 5000.00
//                                )
//
//                            [payee] => Array
//                                (
//                                    [email_address] => sb-kugct32408989@business.example.com
//                                    [merchant_id] => NYYZE5NZ3XCNG
//                                )
//
//                            [description] => Buying the painting 'The destruction Painting' from Elena Salova
//                            [soft_descriptor] => PAYPAL *TEST STORE
//                            [shipping] => Array
//                                (
//                                    [name] => Array
//                                        (
//                                            [full_name] => Sad Sir
//                                        )
//
//                                    [address] => Array
//                                        (
//                                            [address_line_1] => Gey
//                                            [address_line_2] => Gay
//                                            [admin_area_2] => Gay
//                                            [admin_area_1] => AL
//                                            [postal_code] => 12000
//                                            [country_code] => US
//                                        )
//
//                                )
//
//                            [payments] => Array
//                                (
//                                    [captures] => Array
//                                        (
//                                            [0] => Array
//                                                (
//                                                    [id] => 2EB474574T753561D
//                                                    [status] => COMPLETED
//                                                    [amount] => Array
//                                                        (
//                                                            [currency_code] => EUR
//                                                            [value] => 5000.00
//                                                        )
//
//                                                    [final_capture] => 1
//                                                    [seller_protection] => Array
//                                                        (
//                                                            [status] => ELIGIBLE
//                                                            [dispute_categories] => Array
//                                                                (
//                                                                    [0] => ITEM_NOT_RECEIVED
//                                                                    [1] => UNAUTHORIZED_TRANSACTION
//                                                                )
//
//                                                        )
//
//                                                    [create_time] => 2024-09-15T14:40:27Z
//                                                    [update_time] => 2024-09-15T14:40:27Z
//                                                )
//
//                                        )
//
//                                )
//
//                        )
//
//                )
//
//            [payer] => Array
//                (
//                    [name] => Array
//                        (
//                            [given_name] => Sad
//                            [surname] => Sir
//                        )
//
//                    [email_address] => abc@BC.COM
//                    [payer_id] => T5ZFWWJKUK4D2
//                    [address] => Array
//                        (
//                            [country_code] => US
//                        )
//
//                )
//
//            [create_time] => 2024-09-15T14:39:27Z
//            [update_time] => 2024-09-15T14:40:27Z
//            [links] => Array
//                (
//                    [0] => Array
//                        (
//                            [href] => https://api.sandbox.paypal.com/v2/checkout/orders/3HU25201MP342221A
//                            [rel] => self
//                            [method] => GET
//                        )
//
//                )
//
//        )
//
//    [paymentID] => 43
//    [paymentHash] => 3ce5d47bdfb9d9ad137f3046e176e908555c8f00bdaad54fd7fb90e82b642328
//)

if (empty($_POST['paymentID']) || empty($_POST['paymentHash'])) {
    echo json_encode(["error" => 'invalid data']);
    exit();
}

$payment = db_getById('payments', $_POST['paymentID']);

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
Address of the payer: {$_POST['paymentData']['purchase_units']['shipping']['address']['address_line_1']}, {$_POST['paymentData']['purchase_units']['shipping']['address']['address_line_2']}, {$_POST['paymentData']['purchase_units']['shipping']['address']['admin_area_2']}, {$_POST['paymentData']['purchase_units']['shipping']['address']['admin_area_1']}, {$_POST['paymentData']['purchase_units']['shipping']['address']['postal_code']}, {$_POST['paymentData']['purchase_units']['shipping']['address']['country_code']}\n     
---------------------------\n
Order ID: {$_POST['paymentData']['id']}\n
";
    $text = urldecode($text);
    file_get_contents("https://api.telegram.org/bot{$botToken}/sendMessage?chat_id=1&text={$text}");

    echo json_encode(["success" => true]);
} else {

    echo json_encode(["success" => false]);
}

