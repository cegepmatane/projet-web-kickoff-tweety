<?php
require '../vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51ILr0TAt6RTNlhzW6E0arpwAU8Qb8onskfTGcmcNoRhFjvh9gYDE9q6gkOAgjrtM5wgx2LeWAslpxZ890lQGhdst00xFGYenUq');
header('Content-Type: application/json');
$YOUR_DOMAIN = 'http://localhost/projet-web-kickoff-tweety/Tweety';
$checkout_session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'unit_amount' => 2000,
            'product_data' => [
                'name' => 'Donation',
                'images' => ["https://alzheimersfamily.org/wp-content/uploads/2017/07/monetary-donation.jpg"],
            ],
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . '/transaction_completee.php',
    'cancel_url' => $YOUR_DOMAIN . '/transaction_annulee.php',
]);
echo json_encode(['id' => $checkout_session->id]);