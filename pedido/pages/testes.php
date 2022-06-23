<div style="height:150px"></div>

<?php

require '../../vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51LC4N0GIUmR0keuMml3n90z0C4LV1ZCNqzU7mXj33MYJWNl26aPns8XkNIz2gx9Fyp7HVknqzyJK1gmYuh9JuQgP00ESHWXU2F');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://localhost/Lojinha/pedido/';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1LC5pQGIUmR0keuMoCO1qhU3',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success',
  'cancel_url' => $YOUR_DOMAIN . '/cancel',

]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

?>