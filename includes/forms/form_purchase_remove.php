<main>
    <div class="window">
        <div class="title">
            <h1>Remover compra</h1>
        </div>

        <div class="content">
            <form method="POST">
                <div class="logo-center">
                    <div class="logo">
                        <svg aria-hidden="true" width="4em" height="4em" focusable="false" data-prefix="fas" data-icon="shopping-bag" class="svg-inline--fa fa-shopping-bag fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M352 160v-32C352 57.42 294.579 0 224 0 153.42 0 96 57.42 96 128v32H0v272c0 44.183 35.817 80 80 80h288c44.183 0 80-35.817 80-80V160h-96zm-192-32c0-35.29 28.71-64 64-64s64 28.71 64 64v32H160v-32zm160 120c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zm-192 0c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24z"></path></svg>
                    </div>
                </div>
                <input type="number" name="purchase_id" placeholder="ID" min="0" required autocomplete="off" class="purchase"><br>

                <input type="checkbox" id="confirm_removal" name="confirm_purchase_removal" value="true" required autocomplete="off">
                <label for="confirm_removal" class="label_checkbox">Confirmo que desejo remover esta compra</label><br><br><br>
                
                <div class="button-center">
                    <button type="submit">Remover</button>
                </div>
            </form>
        </div> 
    </div>
</main>