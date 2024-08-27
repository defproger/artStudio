<?php
ini_set('display_errors', 0);
header('Content-Type: application/json');
require_once 'db.php';
require 'vendor/autoload.php';

use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

if (empty($_POST['email']) || empty($_POST['method'])) {
    echo json_encode(["error" => 'invalid data']);
    exit();
}

$art = db_getById('gallery', $_POST['art_id']);

if (empty($art['id']) || $art['status'] != 'available') {
    echo json_encode(["error" => 'invalid data']);
    exit();
}

db_insert('payments', [
    "art_id" => $_POST['art_id'],
    "email" => $_POST['email'],
    "name" => $_POST['name'],
    "phone" => $_POST['phone'],
    "address" => $_POST['address'],
    "message" => $_POST['message'],
    "method" => $_POST['method'],
]);

$pay_id = db_getConnection()->lastInsertId();
$pay_hash = cryptHash($pay_id . time());

$apiContext = new ApiContext(
    new OAuthTokenCredential(
        SETTINGS['client_id'],
        SETTINGS['client_secret']
    )
);

$apiContext->setConfig([
    'mode' => SETTINGS['pay_mode'],
    'log.LogEnabled' => true,
    'log.FileName' => '../PayPal.log',
    'log.LogLevel' => SETTINGS['log_level'],
]);

$payer = new Payer();

if ($_POST['method'] == 'paypal')
    $payer->setPaymentMethod('paypal');
else
    $payer->setPaymentMethod('credit_card');

$items = [];
$item = new Item();
$item->setName($art['name'])
    ->setCurrency('EUR')
    ->setQuantity(1)
    ->setPrice(+$art['price']);

$items[] = $item;

$itemList = new ItemList();
$itemList->setItems($items);

$amount = new Amount();
$amount->setCurrency('EUR')
    ->setTotal(+$art['price']);

$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Buying a painting \"{$art['name']}\" by Elena Salova")
    ->setInvoiceNumber(uniqid());

$redirectUrls = new RedirectUrls();


$redirectUrls->setReturnUrl("https://" . SETTINGS['domain'] . "/completeOrder.php?id={$pay_id}_{$pay_hash}")
    ->setCancelUrl("https://" . SETTINGS['domain'] . "/cancelOrder.php?id={$pay_id}_{$pay_hash}");

$payment = new Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions([$transaction]);

try {
    $payment->create($apiContext);

    $approvalUrl = $payment->getApprovalLink();
    db_update('payments', $pay_id, [
        'hash' => $pay_hash,
        'pay_id' => $payment->getToken()
    ]);
    echo json_encode(["payment_url" => $approvalUrl]);
} catch (Exception $ex) {
    echo json_encode(["error" => $ex]);
}