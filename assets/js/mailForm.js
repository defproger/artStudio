$(document).ready(function () {
    $('.form').each(function () {
        const form = $(this);
        const emailInputs = form.find('input[name="mail"]');
        const messageInputs = form.find('input[name="message"]');
        const nextButton = form.find('.next-btn');
        const hiddenInput = form.find('.hidden_input');
        const afterText = form.find('p')

        emailInputs.on('input', function () {
            const value = $(this).val();
            emailInputs.val(value);
        });

        messageInputs.on('input', function () {
            const value = $(this).val();
            messageInputs.val(value);
        });

        let buttonType = 1;
        nextButton.on('click', function (event) {
            event.preventDefault();

            if (buttonType === 1) {
                const emailValue = emailInputs.val();
                if (validateEmail(emailValue)) {
                    hiddenInput.show('fold', {horizFirst: false}, 600);
                    afterText.css('margin-top', '30px')

                    animateButtonText($(this), "send.").then(() => {
                        buttonType = 2;
                    });
                }
            } else if (buttonType === 2) {
                nextButton.on('click', function (event) {
                    event.preventDefault();

                    const msg = messageInputs.val();
                    if (msg != '') {
                        animateButtonText($(this), "sent.").then(() => {
                            sendFormData(form);
                            buttonType = 0;
                        });
                    }
                });
            }

        });
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }

    function animateButtonText(button, newText) {
        return new Promise((resolve) => {
            const originalText = button.text();
            button.html(''); // Очищаем текст кнопки

            // Стираем текст
            let i = originalText.length;
            let typingSpeed = 50; // Скорость печати

            // Анимация стирания текста
            (function deleteText() {
                if (i > 0) {
                    button.text(originalText.substring(0, i - 1));
                    i--;
                    setTimeout(deleteText, typingSpeed);
                } else {
                    // Начинаем печатать новый текст
                    typeWriter(button, newText, resolve);
                }
            })();
        });
    }

    function typeWriter(button, text, callback) {
        let j = 0;
        let typingSpeed = 100; // Скорость печати

        (function type() {
            if (j < text.length) {
                button.append(text.charAt(j));
                j++;
                setTimeout(type, typingSpeed);
            } else if (callback) {
                callback(); // Вызовем колбэк после завершения печати
            }
        })();
    }

    function sendFormData(form) {
        const emailValue = form.find('input[name="mail"]').val();
        const messageValue = form.find('textarea[name="message"]').val();

        $.ajax({
            url: '/app/form.php',
            method: 'POST',
            data: {
                email: emailValue,
                message: messageValue
            }
        });
    }
});