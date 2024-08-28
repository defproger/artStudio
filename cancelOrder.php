<?php
require_once 'app/db.php';
if (!empty($_GET['id']) && !empty($_GET['token'])) {
    list($id, $hash) = explode('_', $_GET['id'], 2);
    $payment = query("select * from payments where id = :id and hash = :hash and pay_id = :token", [
        'id' => $id,
        'hash' => $hash,
        'token' => $_GET['token']
    ]);

    if (!empty($payment['id']) && $payment['status'] == 'created') {
        db_update('payments', $payment['id'], [
            'status' => 'canceled'
        ]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Error</title>
    <link rel="stylesheet" href="assets/css/messages.css">
</head>
<body>
<div class="container">
    <h1>PAYMENT ERROR</h1>
    <br>
    <div class="error-box">

        <p>A transaction error occurred and the transaction was not executed. Repeat the payment attempt.</p>
    </div>
</div>
</body>
</html>
