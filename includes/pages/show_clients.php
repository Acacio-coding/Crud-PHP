<?php 
    $results = '';
  
    foreach ($clients as $client) {
        $results .= '<tr>
                        <td class="client_id">'.$client -> id.'</td>   
                        <td class="client_name">'.$client -> name.'</td>
                        <td class="client_identifier">'.$client -> identifier.'</td>
                        <td class="client_account">R$ '.$client -> account.'</td>
                        <td class="client_action">
                            <a href="client_edit.php?client_id='.$client -> id.'"><i class="fas fa-pen-square"></i></a>
                        </td>
                     </tr>';
    }

    $results = !strlen($results) ? '<td colspan="5">Não existem clientes cadastrados!</td>' : $results;
?>

<main>
    <div class="window">
        <div class="search">
            <form method="POST">
                <?php
                    if (isset($_POST['client_name'], $_POST['client_identifier'])) {
                        if (!empty($_POST['client_name']) && !empty($_POST['client_identifier']))
                            echo '<a href="index.php"><i class="fas fa-undo-alt"></i></a>';
                
                        if (!empty($_POST['client_name']) && empty($_POST['client_identifier'])) 
                            echo '<a href="index.php"><i class="fas fa-undo-alt"></i></a>';
                
                        if (empty($_POST['client_name']) && !empty($_POST['client_identifier'])) {
                            echo '<a href="index.php"><i class="fas fa-undo-alt"></i></a>';
                        }  
                    }     
                ?>
                
                <input type="text" name="client_name" placeholder="Nome" class="user">

                <input type="text" name="client_identifier" placeholder="Sobrenome/Identificador" class="identifier">
                
                <button type="submit">
                    <i class="fas fa-search" ></i>
                </button> 
            </form>
        </div>

        <div class="content">
            <table class="table_client">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome/Identificador</th>
                    <th>Conta</th>
                    <th>Ação</th>
                </thead>

                <tbody>
                    <?php echo $results ?>
                </tbody>
            </table>
        </div> 
    </div>
</main>