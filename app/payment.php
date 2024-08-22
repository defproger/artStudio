<?php
require_once 'init.php';
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
$payer->setPaymentMethod('paypal');
//$payer->setPaymentMethod('credit_card');

$items = [];
$item = new Item();
$item->setName('Название товара')
    ->setCurrency('EUR')
    ->setQuantity(1)
    ->setPrice(10);

$items[] = $item;

$itemList = new ItemList();
$itemList->setItems($items);

$amount = new Amount();
$amount->setCurrency('EUR')
    ->setTotal(10);

$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription('Описание вашей покупки')
    ->setInvoiceNumber(uniqid());

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("https://" . SETTINGS['domain'] . "/completeOrder.php?id=1")
    ->setCancelUrl("https://" . SETTINGS['domain'] . "/cancelOrder.php?id=1");

$payment = new Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions([$transaction]);

try {
    $payment->create($apiContext);

    $approvalUrl = $payment->getApprovalLink();
    echo "Ссылка для оплаты: <a href='{$approvalUrl}'>{$approvalUrl}</a>";
} catch (Exception $ex) {
    echo "Произошла ошибка: " . $ex->getMessage();
}