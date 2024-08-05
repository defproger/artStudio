$(document).ready(function () {
    // Синхронизация всех email и message input внутри формы
    $('.form').each(function () {
        const form = $(this);
        const emailInputs = form.find('input[name="mail"]');
        const messageInputs = form.find('input[name="message"]');
        const nextButton = form.find('.next-btn');
        const hiddenInput = form.find('.hidden_input');
        const afterText = form.find('p')

        // Синхронизация email
        emailInputs.on('input', function () {
            const value = $(this).val();
            emailInputs.val(value);
        });

        // Синхронизация message
        messageInputs.on('input', function () {
            const value = $(this).val();
            messageInputs.val(value);
        });

        let buttonType = 1;
        // Проверка почты и запуск анимации
        nextButton.on('click', function (event) {
            event.preventDefault(); // Предотвращаем перезагрузку страницы

            if (buttonType === 1) {
                const emailValue = emailInputs.val();
                if (validateEmail(emailValue)) {
                    // Показ скрытого инпута с анимацией Fold
                    hiddenInput.show('fold', {horizFirst: false}, 600);
                    afterText.css('margin-top', '30px')

                    // Анимация текста в кнопке
                    animateButtonText($(this), "send.").then(() => {
                        buttonType = 2;
                    });
                }
            } else {
                nextButton.on('click', function (event) {
                    event.preventDefault(); // Предотвращаем перезагрузку страницы

                    const msg = messageInputs.val();
                    if (msg != '') {
                        animateButtonText($(this), "sent.").then(() => {
                            // После изменения текста на "send", выполняем AJAX-запрос
                            sendFormData(form);
                        });
                    }
                });
            }

        });
    });

    // Функция для проверки валидности email
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }

    // Функция для анимации текста в кнопке
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

    // Функция для анимации печати
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

    // Функция для отправки данных формы через AJAX
    function sendFormData(form) {
        const emailValue = form.find('input[name="mail"]').val();
        const messageValue = form.find('input[name="message"]').val();

        $.ajax({
            url: 'your-server-endpoint', // Замените на реальный URL вашего сервера
            method: 'POST',
            data: {
                email: emailValue,
                message: messageValue
            }
        });
    }
});