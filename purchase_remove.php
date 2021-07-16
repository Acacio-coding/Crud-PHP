<?php
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Purchase;

    if (isset($_POST['purchase_id'])) {
        $purchase = Purchase::getOnePurchase($_POST['purchase_id']);

        if (!$purchase instanceof Purchase) {
            header('location: /includes/messages/error.php?from=purchase');
            exit;
        }

        $statement = $purchase -> removePurchase();

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
    require __DIR__.'/includes/forms/form_purchase_remove.php';
    require __DIR__.'/includes/pages/foot.php';
