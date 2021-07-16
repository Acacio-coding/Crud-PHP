<?php
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Payment;

    
    if (isset($_POST['client_id'], $_POST['payment_amount'])) {
        $payment = new Payment();
        $payment -> amount = $_POST['payment_amount'];
        $payment -> status = 0;
        $payment -> client_id = $_POST['client_id'];

        if (empty($_POST['payment_method']))
            $payment -> method = 'Não informado';

        if ($_POST['payment_method'] == 'money')
            $payment -> method = 'Dinheiro';

        if ($_POST['payment_method'] == 'credit_card')
            $payment -> method = 'Crédito';

        if ($_POST['payment_method'] == 'debit_card')
            $payment -> method = 'Débito';

        if ($_POST['payment_method'] == 'pix')
            $payment -> method = 'Pix';

        $statement = $payment -> addPayment();

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
    require __DIR__.'/includes/forms/form_payment_add.php';
    require __DIR__.'/includes/pages/foot.php';
