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
$arts = queryAll("SELECT * FROM `gallery` WHERE `id` != :id", ['id' => $art['id']]);
shuffle($arts);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artwork Information</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/second_main.css">
    <link rel="stylesheet" href="assets/css/second_mobile.css">
    <link rel="icon" href="favicon.png" type="image/png">
</head>
<body>

<div class="container">
    <div id="box2" class="black-square"></div>
    <div class="gallery-container">
        <div class="back-button-group">
            <a class="arrow-link" href="#">
                <img class="arrow-button" src="assets/img/arrow-left.png" alt="<-">
            </a>
            <a href="index.php" class="back-to-gallery">Back to Gallery</a>
        </div>

        <h1 class="artist-name">&nbsp;Elena Salova</h1>

        <div class="main-content">
            <img id="box1" onmouseover="moveBox2()" src="assets/img/works/<?= $art['image'] ?>"
                 alt="The destruction Painting"
                 class="main-image">
            <div class="painting-info">
                <h2 class="painting-title"><?= $art['name'] ?></h2>
                <p class="painting-medium"><?= $art['type'] ?></p>
                <p class="painting-dimensions"><?= $art['size'] ?></p>
                <p class="painting-description">
                    <?= $art['description'] ?>
                </p>
                <?php if ($art['status'] != 'available'): ?>
                    <p class="painting-status">&nbsp;<?= $art['status'] ?></p>
                <?php else: ?>
                    <a href="payment.php?id=<?= $art['id'] ?>" class="confirm-button">buy</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="more-like-this">
            <h3 class="see-more">See More Like This</h3>
            <div class="similar-paintings">
                <?php
                $i = 0;
                foreach ($arts as $art):
                    if ($i >= 3) {
                        break;
                    }
                    ?>
                    <a href="artwork_info.php?id=<?= $art['id'] ?>" class="similar-painting">
                        <img src="assets/img/works/<?= $art['image'] ?>">
                        <p class="sub-title"><?= $art['name'] ?></p>
                    </a>
                    <?php
                    $i++;
                endforeach;
                ?>
            </div>
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
        <p> © 2024</p>
    </footer>

</div>

<script>
    function moveBox2() {
        var box2 = document.getElementById('box2');
        box2.classList.toggle('moved');
    }
</script>

</body>
</html>
