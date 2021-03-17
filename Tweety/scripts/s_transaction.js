var stripe = Stripe("pk_test_51ILr0TAt6RTNlhzW0Fw2G0hAvozfMkXYi2sXGUEUMO9J2UBPMKlHphoSRklvh9zSp3UCCQYFNbya5zsqkx0lcJPd00QiggSeaW");
var checkoutButton = document.getElementById("checkout-button");
checkoutButton.addEventListener("click", function () {
    fetch("/action/a_creer_transaction.php", {
        method: "POST",
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (session) {
            return stripe.redirectToCheckout({ sessionId: session.id });
        })
        .then(function (result) {
            // If redirectToCheckout fails due to a browser or network
            // error, you should display the localized error message to your
            // customer using error.message.
            if (result.error) {
                alert(result.error.message);
            }
        })
        .catch(function (error) {
            console.error("Error:", error);
        });
});
