document.addEventListener('DOMContentLoaded', function () {

    let menuButton = document.getElementById('menu');
    let menuPopup = document.getElementById('menuPopup');
    let closeButton = document.getElementById('closeMenuButton');

    menuButton.addEventListener('click', function () {
        menuPopup.classList.remove('closed');
        setTimeout(() => {
            menuPopup.classList.add('open');
        }, 50);
    });

    closeButton.addEventListener('click', function () {
        menuPopup.classList.remove('open');
        setTimeout(() => {
            menuPopup.classList.add('closed');
        }, 500);
    });
});
