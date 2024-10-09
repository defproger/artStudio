$(document).ready(function () {
    $('.form').each(function () {
        const form = $(this);
        const emailInputs = form.find('input[name="mail"]');
        const messageInputs = form.find('textarea[name="message"]');
        const nextButton = form.find('.next-btn');
        const hiddenInput = form.find('.hidden_input');
        const afterText = form.find('p');

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
                    afterText.css('margin-top', '30px');

                    nextButton.prop('disabled', true);

                    animateButtonText($(this), "send.").then(() => {
                        buttonType = 2;
                        nextButton.prop('disabled', false);
                    });
                }
            } else if (buttonType === 2) {
                const msg = messageInputs.val();
                if (msg !== '') {
                    nextButton.prop('disabled', true);

                    animateButtonText($(this), "sent.").then(() => {
                        sendFormData(form);
                        buttonType = 0;
                        nextButton.prop('disabled', true);
                    });
                }
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
            button.html('');

            let i = originalText.length;
            const typingSpeed = 50;

            (function deleteText() {
                if (i > 0) {
                    button.text(originalText.substring(0, i - 1));
                    i--;
                    setTimeout(deleteText, typingSpeed);
                } else {
                    typeWriter(button, newText, resolve);
                }
            })();
        });
    }

    function typeWriter(button, text, callback) {
        let j = 0;
        const typingSpeed = 100;

        (function type() {
            if (j < text.length) {
                button.append(text.charAt(j));
                j++;
                setTimeout(type, typingSpeed);
            } else if (callback) {
                callback();
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