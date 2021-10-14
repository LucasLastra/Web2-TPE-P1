{include file='templates/header.tpl'}

<div class="container">
    <h1>{$titulo}</h1>
    <div class="row mt-4">
        
        <div class="col-md-6">
            <form class="form-alta" action="{if $pagina == 'login'}
            verifyLogin{else}verifySignup{/if}" method="post">
                <input placeholder="Nombre" type="text" name="usuario" id="usuario" required>
                <input placeholder="Contraseña" type="password" name="password" id="password" required>
                {if $pagina == 'signup'}
                <input placeholder="Repetir contraseña" type="password" name="password2" id="password2" required>
                {/if}
                <input type="submit" class="btn btn-primary btn-login" value="{$titulo}">
            </form>
            {if $mensaje != ''}
            <h3 class="alert-warning">{$mensaje}</h3>
            {/if}
            
        </div>
        <div class="col-md-6">
            <img class="img-fluid img-thumbnail" src="../img/guitar-abstract.jpg" alt="Dibujo abstracto guitarra">
        </div>
    </div>
</div>

{include file='templates/footer.tpl'}