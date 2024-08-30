<?php
require_once 'app/db.php';
if (!empty($_GET['id']) && !empty($_GET['token'])) {
    list($id, $hash) = explode('_', $_GET['id'], 2);
    $payment = query("select p.*, art.name as art_name
        from payments p
        left join gallery art on art.id = p.art_id
        where p.id = :id and p.hash = :hash and p.pay_id = :token", [
        'id' => $id,
        'hash' => $hash,
        'token' => $_GET['token']
    ]);

    if (!empty($payment['id']) && $payment['status'] == 'created') {
        db_update('payments', $payment['id'], [
            'status' => 'completed'
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
        ";
        $text = urldecode($text);
        file_get_contents("https://api.telegram.org/bot{$botToken}/sendMessage?chat_id=1&text={$text}");
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
    <h1>PAYMENT SUCCESS</h1>
    <br>
    <div class="error-box">

        <p>The transaction was successful. Thank you for choosing to buy art from us. We make the world more
            beautiful!</p>
    </div>
</div>
</body>
</html>
