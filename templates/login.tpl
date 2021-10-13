{include file='templates/header.tpl'}

<div class="container">
    <h2>{$titulo}</h2>
    <div class="row mt-4">
        
        <div class="col-md-6">
            <form class="form-alta" action="{if $titulo == 'Iniciar Sesión'}
            verifyLogin{else}verifySignup{/if}" method="post">
                <input placeholder="Nombre" type="text" name="usuario" id="usuario" required>
                <input placeholder="password" type="password" name="password" id="password" required>
                <input type="submit" class="btn btn-primary" value="{$titulo}">
            </form>
            <h3 class="alert-warning">{$mensaje}</h3>
        </div>
        <div class="col-md-6">
            <img class="img-fluid img-thumbnail" src="../img/guitar-abstract.jpg" alt="Dibujo abstracto guitarra">
        </div>
    </div>
</div>

{include file='templates/footer.tpl'}