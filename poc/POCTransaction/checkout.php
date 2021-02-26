<!DOCTYPE html>
<html>
<head>
    <title>Donation a Tweety</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<section>
    <div class="product">
        <img
                src="https://alzheimersfamily.org/wp-content/uploads/2017/07/monetary-donation.jpg"
                alt="Image"
        />
        <div class="description">
            <h3>Donation</h3>
            <h5>$20.00</h5>
        </div>
    </div>
    <button type="button" id="checkout-button">Checkout</button>
</section>
<script type="text/javascript">
    // Create an instance of the Stripe object with your publishable API key
    var stripe = Stripe("pk_test_51ILr0TAt6RTNlhzW0Fw2G0hAvozfMkXYi2sXGUEUMO9J2UBPMKlHphoSRklvh9zSp3UCCQYFNbya5zsqkx0lcJPd00QiggSeaW");
    var checkoutButton = document.getElementById("checkout-button");
    checkoutButton.addEventListener("click", function () {
        fetch("http://localhost/projet-web-kickoff-tweety/poc/POCTransaction/create-checkout-session.php", {
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
</script>
</body>
</html>