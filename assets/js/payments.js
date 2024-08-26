const form = document.getElementById('payment-form');
const methodButtons = document.querySelectorAll('.method-btn');
const confirmBtn = document.getElementById('paybtn');
let paymentUrl = '';

function checkFormCompletion() {
    const allFieldsFilled = Array.from(form.elements).every((input) => {
        return input.required ? input.value.trim() !== '' : true;
    });

    methodButtons.forEach(btn => {
        btn.disabled = !allFieldsFilled;
        btn.style.pointerEvents = allFieldsFilled ? 'auto' : 'none';
    });
}

form.addEventListener('input', checkFormCompletion);

methodButtons.forEach(btn => {
    btn.addEventListener('click', async function (event) {
        event.preventDefault();
        methodButtons.forEach(button => button.style.backgroundColor = '');
        this.style.backgroundColor = 'black';

        const formData = new FormData(form);
        formData.append('payment_method', this.dataset.method);

        const response = await fetch('app/payment.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        paymentUrl = result.payment_url;

        if (paymentUrl) {
            confirmBtn.style.pointerEvents = 'auto';
        }
    });
});

confirmBtn.addEventListener('click', (event) => {
    if (paymentUrl) {
        window.location.href = paymentUrl;
    } else {
        event.preventDefault();
    }
});

methodButtons.forEach(btn => {
    btn.disabled = true;
    btn.style.pointerEvents = 'none';
});