<?php
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Purchase;
    use \App\entity\Client;

    if (isset($_POST['client_id'])) {
        $purchases = Purchase::getAllPurchasesFromOneClient($_POST['client_id']);
        $client = Client::getClient($_POST['client_id']);
        $client_name = $client -> name;
        $client_identifier = $client -> identifier;
    } else {
        $purchases = Purchase::getAllPurchases();
    }

    require __DIR__.'/includes/pages/head.php';
    require __DIR__.'/includes/navs/main_nav_purchase.php';
    require __DIR__.'/includes/navs/sub_nav_purchases.php';
    require __DIR__.'/includes/pages/show_purchases.php';
    require __DIR__.'/includes/pages/foot.php';
