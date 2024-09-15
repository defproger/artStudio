<?php
require 'app/db.php';
function getBack()
{
    header('Location: /');
    exit;
}

if (!isset($_GET['id'])) {
    getBack();
}
$art = db_getById('gallery', $_GET['id']);
if (!$art) {
    getBack();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painting Payment Page</title>
    <link rel="stylesheet" href="assets/css/main_payment.css">
    <link rel="stylesheet" href="assets/css/mobile_payment.css">
</head>
<body>
<div class="container">
    <div class="back-button-group back-button-group-head">
        <a class="arrow-link" href="artwork_info.php?id=<?= $art['id'] ?>">
            <img class="arrow-button" src="assets/img/arrow-left.png" alt="<-">
        </a>
        <a href="index.php" class="back-to-gallery">Back to Gallery</a>
    </div>
    <h2 class="artist-name">&nbsp;Payment</h2>
    <div class="content">
        <div class="painting-info">
            <img src="assets/img/works/<?= $art['image'] ?>" alt="<?= $art['name'] ?>" class="main-image">
            <h1 class="title-payment"><?= $art['name'] ?></h1>
            <p class="material-payment"><?= $art['type'] ?></p>
            <p class="sizes-payment"><?= $art['size'] ?></p>
            <p class="text-payment"><?= $art['description'] ?></p>
            <div class="price-group-head">
                <p class="price"><?= $art['price'] ?></p>
                <p class="euro">EURO</p>
            </div>

        </div>

        <div class="payment-form">

            <form id="payment-form">
                <input type="hidden" name="art_id" value="<?= $art['id'] ?>">
                <div class="input-group">
                    <label for="email"><span class="red-xmast">*</span>YOUR EMAIL</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="name"><span class="red-xmast">*</span>NAME and SURNAME</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="input-group">
                    <label for="phone"><span class="red-xmast">*</span>MOBILE PHONE</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="input-group">
                    <label for="address"><span class="red-xmast">*</span>ADDRESS</label>
                    <input type="text" id="address" name="address" required>
                    <p class="mini-deskription">Sit amet, consectetur adipiscing elit. Praesent at cursus magna, at dap
                        bus eros. </p>
                </div>

                <div class="input-group">
                    <label for="message">MESSAGE</label>
                    <textarea id="message" maxlength="110" cols="10" name="message"></textarea>
                </div>
            </form>
        </div>
    </div>

    <div class="confirmation">
        <div class="price-group">
            <p class="price"><?= $art['price'] ?></p>
            <p class="euro">EURO</p>
        </div>

        <a href="#" id="paybtn" class="btn-back" style="pointer-events: none;">
            <div class="confirm-button">CONFIRM</div>
        </a>
    </div>

    <div class="certificate">
        <input type="checkbox" id="certificate" name="certificate">
        <label for="certificate">I want to receive certificate of authenticity of original artwork</label>
    </div>
</div>

<footer>
    <div class="back-button-group">
        <a class="arrow-link-footer" href="#">
            <img class="arrow-button" src="assets/img/arrow-white.png" alt="<-">
        </a>
        <a href="index.php" class="back-to-gallery footer-back-addition">Back to Gallery</a>
    </div>
    <a href="privacy.html" class="privacy-policy">Privacy</a>
    <p>All Rights Reserved</p>
    <p>© 2024</p>
</footer>
<script src="assets/js/payments.js"></script>
</body>
</html>