document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('payment-form');
    const payBtn = document.getElementById('paybtn');
    const emailInput = document.getElementById('email');
    const nameInput = document.getElementById('name');
    const phoneInput = document.getElementById('phone');
    const addressInput = document.getElementById('address');

    function checkFormValidity() {
        if (emailInput.value.trim() !== '' &&
            nameInput.value.trim() !== '' &&
            phoneInput.value.trim() !== '' &&
            addressInput.value.trim() !== '' &&
            validateEmail(emailInput.value) &&
            validatePhone(phoneInput.value)) {
            payBtn.style.pointerEvents = 'auto';
            payBtn.classList.add('active');
        } else {
            payBtn.style.pointerEvents = 'none';
            payBtn.classList.remove('active');
        }
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }

    function validatePhone(phone) {
        const re = /^\+?\d{10,15}$/;
        return re.test(String(phone));
    }

    payBtn.addEventListener('click', function (event) {
        event.preventDefault();
        if (payBtn.style.pointerEvents === 'auto') {
            const formData = new FormData(form);

            fetch('app/createPayment.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.payment_url) {
                        window.location.href = data.payment_url;
                    } else {
                        alert('Payment failed. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });

    emailInput.addEventListener('input', checkFormValidity);
    nameInput.addEventListener('input', checkFormValidity);
    phoneInput.addEventListener('input', checkFormValidity);
    addressInput.addEventListener('input', checkFormValidity);

    checkFormValidity();
});