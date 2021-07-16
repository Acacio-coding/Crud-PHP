<?php 
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Client;

    if (isset($_GET['client_id']) && is_numeric($_GET['client_id']) && $_GET['client_id'] > 0){
        $client = Client::getClient($_GET['client_id']);

        if ($client instanceof Client)
            if (isset($_POST['client_name'], $_POST['client_identifier']) && !empty($_POST['client_name']) && !empty($_POST['client_identifier'])) {
                $client -> name = $_POST['client_name'];
                $client -> identifier = $_POST['client_identifier'];
                $client -> updateClient();

                if (!$statement) {
                    header('location: /includes/messages/error.php?from=client');
                    exit;   
                }else {
                    header('location: /includes/messages/success.php?from=client');
                    exit;   
                }  
            }
    }
        
    require __DIR__.'/includes/pages/head.php';
    require __DIR__.'/includes/navs/main_nav.php';
    require __DIR__.'/includes/forms/form_client_edit.php';  
    require __DIR__.'/includes/pages/foot.php';