<?php
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Purchase;

    if (isset($_GET['purchase_id']) && is_numeric($_GET['purchase_id']) && $_GET['purchase_id'] > 0) {
        $purchase = Purchase::getOnePurchase($_GET['purchase_id']);

        if ($purchase instanceof Purchase) {
            if (isset($_POST['purchase_description'], $_POST['purchase_value']) && !empty($_POST['purchase_description']) && !empty($_POST['purchase_value'])) {
                $purchase -> description = $_POST['purchase_description'];
                $purchase -> value = $_POST['purchase_value'];
                $statement = $purchase -> updatePurchase();

                if (!$statement) {
                    header('location: /includes/messages/error.php?from=purchase');
                    exit;   
                }else {
                    header('location: /includes/messages/success.php?from=purchase');
                    exit;   
                }
            }
        }
    }

    require __DIR__.'/includes/pages/head.php';
    require __DIR__.'/includes/navs/main_nav.php';
    require __DIR__.'/includes/forms/form_purchase_edit.php';
    require __DIR__.'/includes/pages/foot.php';