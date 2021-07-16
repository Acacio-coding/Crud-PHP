<?php
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Payment;

    if (isset($_GET['payment_id']) && is_numeric($_GET['payment_id']) && $_GET['payment_id'] > 0) {
        $payment = Payment::getOnePayment($_GET['payment_id']);

        if ($payment instanceof Payment) {
            if (isset($_POST['payment_amount'])) {
                $payment -> amount = $_POST['payment_amount'];
        
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
        
                $statement = $payment -> updatePayment();
        
                if ($statement == true) { 
                    header('location: /includes/messages/success.php?from=payment');
                    exit;
                } else {
                    header('location: /includes/messages/error.php?from=payment');         
                    exit;
                }     
            }
        }
    }

    require __DIR__.'/includes/pages/head.php';
    require __DIR__.'/includes/navs/main_nav.php';
    require __DIR__.'/includes/forms/form_payment_edit.php';
    require __DIR__.'/includes/pages/foot.php';
