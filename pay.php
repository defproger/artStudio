<?php
require_once 'app/db.php';
if (!empty($_GET['id'])) {
    list($id, $hash) = explode('_', $_GET['id'], 2);
    $payment = query("select p.*, art.name as art_name, art.price as art_price
        from payments p
        left join gallery art on art.id = p.art_id
        where p.id = :id and p.hash = :hash", [
        'id' => $id,
        'hash' => $hash,
    ]);

    if (empty($payment['id']) || $payment['status'] != 'created') {
        header('Location: /');
        exit;
    }
} else {
    header('Location: /');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <link rel="icon" href="favicon.png" type="image/png">
</head>
<body>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    #paypal-button-container {
        width: 300px;
    }
</style>

<form action="" style="display: none" id="payData">
    <input type="hidden" name="price" value="<?= $payment['art_price'] ?>">
    <input type="hidden" name="name" value="<?= $payment['art_name'] ?>">
    <input type="hidden" name="paymentID" value="<?= $payment['id'] ?>">
    <input type="hidden" name="paymentHash" value="<?= $payment['hash'] ?>">
</form>
<div id="paypal-button-container"></div>

<script src="https://www.paypal.com/sdk/js?client-id=<?= SETTINGS['client_id'] ?>&currency=EUR"></script>
<script src="assets/js/payPal.js"></script>
</body>
</html>
