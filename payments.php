<?php
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Payment;
    use \App\entity\Client;

    if (isset($_POST['client_id'])) {
        $payments = Payment::getAllPaymentsFromOneClient($_POST['client_id']);
        $client = Client::getClient($_POST['client_id']);
        $client_name = $client -> name;
        $client_identifier = $client -> identifier;
    } else
        $payments = Payment::getAllPayments();

    require __DIR__.'/includes/pages/head.php';
    require __DIR__.'/includes/navs/main_nav_payment.php';
    require __DIR__.'/includes/navs/sub_nav_payments.php';
    require __DIR__.'/includes/pages/show_payments.php';
    require __DIR__.'/includes/pages/foot.php';
