<?php
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Client;

    if (isset($_POST['client_name'], $_POST['client_identifier'])) {
        $name = '"'.$_POST['client_name'].'"';
        $identifier = '"'.$_POST['client_identifier'].'"';

        if (!empty($_POST['client_name']) && !empty($_POST['client_identifier']))
            $where = 'name = '.$name.' AND identifier = '.$identifier;

        else if (empty($_POST['client_name']) && !empty($_POST['client_identifier']))
            $where = 'identifier = '.$identifier;

        else if (!empty($_POST['client_name']) && empty($_POST['client_identifier']))
            $where = 'name = '.$name;

        else 
            $where = null;
    } else {
        $where = null;
    }

    $clients = Client::getClients();
   
    require __DIR__.'/includes/pages/head.php';
    require __DIR__.'/includes/navs/main_nav_client.php';
    require __DIR__.'/includes/navs/sub_nav_client.php';
    require __DIR__.'/includes/pages/show_clients.php';
    require __DIR__.'/includes/pages/foot.php';

    