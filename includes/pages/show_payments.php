<?php 
    $results = '';
    $show_discount_to_client_account = '';
    
    foreach ($payments as $payment) {
        if ($payment -> status == 0)
            $show_discount_to_client_account = '<a href="discount.php?client_id='.$payment -> client_id.'&payment_amount='.$payment -> amount.'"><i class="fas fa-hand-holding-usd"></i></i></i></i></a>';
        else
            $show_discount_to_client_account = 'Pagamento já lançado';

        if (isset($client_name, $client_identifier)) 
            $results .= '<tr>
                            <td class="payment_id">'.$payment -> id.'</td>   
                            <td class="payment_method">'.$payment -> method.'</td>
                            <td class="payment_date">'.date('d/m/Y', strtotime($payment -> date)).'</td>
                            <td class="payment_amount">R$ '.$payment -> amount.'</td>
                            <td class="payment_action">'.$show_discount_to_client_account.'</td>
                         </tr>';               
        else 
            $results .= '<tr>
                            <td class="payment_id">'.$payment -> id.'</td>   
                            <td class="payment_method">'.$payment -> method.'</td>
                            <td class="payment_date">'.date('d/m/Y', strtotime($payment -> date)).'</td>
                            <td class="payment_amount">R$ '.$payment -> amount.'</td>
                            <td class="payment_action"><a href="payment_edit.php?payment_id='.$payment -> id.'"><i class="fas fa-pen-square"></i></i></a></td
                         </tr>';  
    }
    
    $results = !strlen($results) ? '<td colspan="6">Não existem pagamentos cadastrados!</td>' : $results; 
?>

<main>
    <div class="window">
        <div class="title">
            <?php
                if (isset($client_name, $client_identifier))
                    echo '<h2>Mostrando pagamentos de: <span id="has_client">'.$client_name.' '.$client_identifier.'</span></h2>';                    
                else
                    echo "<h2>Mostrando pagamentos de todos os clientes</h2>";
            ?>  
        </div>

        <div class="search">
            <form method="POST">
                <?php
                    if (isset($client_name, $client_identifier))
                        echo '<a href="payments.php"><i class="fas fa-undo-alt"></i></a>';                    
                ?> 
                <input type="number" name="client_id" placeholder="ID do cliente" required min="0" class="user">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="content">
            <table class="table_payment">
                <thead>
                    <th class="payment_id">ID do pagamento</th>
                    <th class="payment_method">Método</th>
                    <th class="payment_date">Data</th>
                    <th class="payment_amount">Quantia</th>
                    <th class="payment_action">Ação</th>    
                </thead>

                <tbody>
                    <?php echo $results ?>
                </tbody>
            </table>
        </div> 
    </div>
</main>