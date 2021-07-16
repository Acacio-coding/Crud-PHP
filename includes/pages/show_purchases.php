<?php 
    $results = '';
    $show_compute_to_client_account = '';
    
    foreach ($purchases as $purchase) {
        if ($purchase -> status == 0)
            $show_compute_to_client_account = '<a href="compute.php?client_id='.$purchase -> client_id.'&purchase_value='.$purchase -> value.'"><i class="fas fa-cash-register"></i></a>';     
        else
            $show_compute_to_client_account = 'Compra já contabilizada';

        if (isset($client_name, $client_identifier)) {
            $results .= '<tr>
                            <td class="purchase_id">'.$purchase -> id.'</td>   
                            <td class="purchase_description">'.$purchase -> description.'</td>
                            <td class="purchase_date">'.date('d/m/Y', strtotime($purchase -> date)).'</td>
                            <td class="purchase_value">R$ '.$purchase -> value.'</td>
                            <td class="purchase_action">'.$show_compute_to_client_account.'</td>
                         </tr>';
        } else {
            $results .= '<tr>
                            <td class="purchase_id">'.$purchase -> id.'</td>   
                            <td class="purchase_description">'.$purchase -> description.'</td>
                            <td class="purchase_date">'.date('d/m/Y', strtotime($purchase -> date)).'</td>
                            <td class="purchase_value">R$ '.$purchase -> value.'</td>
                            <td class="purchase_action"><a href="purchase_edit.php?purchase_id='.$purchase -> id.'"><i class="fas fa-pen-square"></i></i></a></td
                         </tr>';
        }  
    }
    
    $results = !strlen($results) ? '<td colspan="6">Não existem compras cadastradas!</td>' : $results; 
?>

<main>
    <div class="window">
        <div class="title">
            <?php
                if (isset($client_name, $client_identifier))
                    echo '<h2>Mostrando compras de: <span id="has_client">'.$client_name.' '.$client_identifier.'</span></h2>';                    
                else
                    echo "<h2>Mostrando compras de todos os clientes</h2>";
            ?>  
        </div>

        <div class="search">
            <form method="POST">
                <?php
                    if (isset($client_name, $client_identifier))
                        echo '<a href="purchases.php"><i class="fas fa-undo-alt"></i></a>';                    
                ?> 
                <input type="number" name="client_id" placeholder="ID do cliente" required min="0" class="user">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="content">
            <table class="table_purchase">
                <thead>
                    <th class="purchase_id">ID da compra</th>
                    <th class="purchase_description">Descrição</th>
                    <th class="purchase_date">Data</th>
                    <th class="purchase_value">Valor</th>
                    <th class="purchase_action">Ação</th>  
                </thead>

                <tbody>
                    <?php echo $results ?>
                </tbody>
            </table>
        </div> 
    </div>
</main>