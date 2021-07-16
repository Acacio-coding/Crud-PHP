<?php
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Purchase;

    

    if (isset($_POST['client_id'], $_POST['purchase_value'])) {
        $purchase = new Purchase(); 
        $purchase -> value = $_POST['purchase_value'];
        $purchase -> status = 0;
        $purchase -> client_id = $_POST['client_id'];

        if (empty($_POST['purchase_description']))
            $purchase -> description = 'Não informado';
        else
            $purchase -> description = $_POST['purchase_description'];

        $statement = $purchase -> addPurchase();

        if ($statement == true) { 
            header('location: /includes/messages/success.php?from=purchase');
            exit;
        } else {
            header('location: /includes/messages/error.php?from=purchase');         
            exit;
        }     
    }

    require __DIR__.'/includes/pages/head.php';
    require __DIR__.'/includes/navs/main_nav.php';
    require __DIR__.'/includes/forms/form_purchase_add.php';
    require __DIR__.'/includes/pages/foot.php';
