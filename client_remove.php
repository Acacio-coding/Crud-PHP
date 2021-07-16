<?php
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Client;

    if (isset($_POST['client_id'], $_POST['confirm_client_removal'])) {
        $client = Client::getClient($_POST['client_id']);

        if (!$client instanceof Client) {
            header('location: /includes/messages/error.php?from=client');
            exit;
        }

        $statement = $client -> removeClient();

        if ($statement == true) { 
            header('location: /includes/messages/success.php?from=client');
            exit;
        } else {
            header('location: /includes/messages/error.php?from=client');         
            exit;
        } 
    }

    require __DIR__.'/includes/pages/head.php';
    require __DIR__.'/includes/navs/main_nav.php';
    require __DIR__.'/includes/forms/form_client_remove.php';
    require __DIR__.'/includes/pages/foot.php';
