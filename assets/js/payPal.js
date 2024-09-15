let artPrice = document.querySelector('#payData input[name="price"]').value;
let artName = document.querySelector('#payData input[name="name"]').value;
let paymentID = document.querySelector('#payData input[name="paymentID"]').value;
let paymentHash = document.querySelector('#payData input[name="paymentHash"]').value;

paypal.Buttons({
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: artPrice
                },
                description: `Buying the painting ${artName} from Elena Salova`
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            fetch('app/confirmPayment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    orderID: data.orderID,
                    payerID: data.payerID,
                    paymentData: details,
                    paymentID: paymentID,
                    paymentHash: paymentHash
                })
            }).then(function (res) {
                return res.json();
            }).then(function (response) {
                if (response.success) {
                    window.location.href = '/completeOrder.php';
                } else {
                    window.location.href = '/cancelOrder.php';
                }
            }).catch(function (error) {
                console.error('Error sending data to server:', error);
                alert('An error occurred while processing the payment.');
            });
        });
    },
    onError: function (err) {
        console.error('Error processing payment:', err);
        alert('An error occurred while processing the payment.');
    }
}).render('#paypal-button-container');