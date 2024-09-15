<?php
ini_set('display_errors', 0);
header('Content-Type: application/json');
require_once 'db.php';

if (empty($_POST['email'])) {
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
]);

$pay_id = db_getConnection()->lastInsertId();
$pay_hash = cryptHash($pay_id . time());

db_update('payments', $pay_id, [
    'hash' => $pay_hash,
]);

echo json_encode(["payment_url" => "/pay.php?id=" . $pay_id . "_" . $pay_hash]);