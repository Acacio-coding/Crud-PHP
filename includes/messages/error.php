<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if (strcmp($_GET['from'], 'purchase') == 0)
                echo '<meta http-equiv="refresh" content="3; url=/../../purchases.php">';

            else if (strcmp($_GET['from'], 'payment') == 0)
                echo '<meta http-equiv="refresh" content="3; url=/../../payments.php">';

            else
                echo '<meta http-equiv="refresh" content="3; url=/../../index.php">'
        ?>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/4c130f3c30.js" crossorigin="anonymous"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="/includes/public/css/style.css">

        <!-- Icon -->
        <link rel="shortcut icon" href="/includes/public/img/icon.png" type="image/x-icon">

        <title>Aplicativo</title>
    </head>
    <body>
        <div class="message_window">
            <div class="message_content_error">
                <i class="fas fa-times"></i>
                <h2>Erro ao realizar a ação!</h2>
            </div>
        </div>
    </body>
</html>