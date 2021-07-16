<?php
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Client;

    if (isset($_POST['client_name'], $_POST['client_identifier'], $_POST['account_value'])) {
        $client = new Client();
        $client -> name = $_POST['client_name'];
        $client -> identifier = $_POST['client_identifier'];
        $client -> account = $_POST['account_value'];

        $statement = $client -> registerClient();

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
    require __DIR__.'/includes/forms/form_client_register.php';
    require __DIR__.'/includes/pages/foot.php';
