<?php
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Client;

    $client = Client::getClient($_GET['client_id']);
    $client_name = $client -> name;
    $client_identifier = $client -> identifier;

    if (isset($_POST['confirm_purchase_compute'])) {
        $client -> account += $_GET['purchase_value'];
        $statement = $client -> updateClientAccount();
        

        if (!$statement) {
            header('location: /includes/messages/error.php?from=client');
            exit;   
        }else {
            header('location: /includes/messages/success.php?from=client');
            exit;   
        }
    }

    require __DIR__.'/includes/pages/head.php';
    require __DIR__.'/includes/navs/main_nav.php';
    require __DIR__.'/includes/forms/form_compute_purchase.php';
    require __DIR__.'/includes/pages/foot.php';