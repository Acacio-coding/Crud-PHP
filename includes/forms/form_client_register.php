<main>
    <div class="window">
        <div class="title">
            <h1>Cadastrar cliente</h1>
        </div>

        <div class="content">
            <form method="POST">
                <div class="logo-center">
                    <div class="logo">
                        <svg aria-hidden="true" width="4em" height="4em" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
                    </div>
                </div>
                <input type="text" name="client_name" placeholder="Nome" required autocomplete="off" class="user"><br><br>

                <input type="text" name="client_identifier" placeholder="Sobrenome/Identificador" required autocomplete="off" class="identifier"><br><br>

                <input type="number" name="account_value" placeholder="Valor da conta" required autocomplete="off" min="0" step=".01" class="value"><br><br><br>
                
                <div class="button-center">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </div> 
    </div>
</main>