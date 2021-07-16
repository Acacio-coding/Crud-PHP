<?php 
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Payment;

    if (isset($_POST['payment_id'], $_POST['confirm_payment_removal'])) {
        $payment = Payment::getOnePayment($_POST['payment_id']);

        if (!$payment instanceof Payment) {
            header('location: /includes/messages/error.php?from=payment');
            exit;
        }

        $statement = $payment -> removePayment();

        if ($statement == true) { 
            header('location: /includes/messages/success.php?from=payment');
            exit;
        } else {
            header('location: /includes/messages/error.php?from=payment');         
            exit;
        }  
    }

    require __DIR__.'/includes/pages/head.php';
    require __DIR__.'/includes/navs/main_nav.php';
    require __DIR__.'/includes/forms/form_payment_remove.php';
    require __DIR__.'/includes/pages/foot.php';