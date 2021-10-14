{include file='templates/header.tpl'}

<div class="container container-abm">
    <h1>{$titulo}</h1>

    {if $pagina == 'abmGeneros'}
    {if $msj != ''}
    <h3 class="alert-warning">{$msj}</h3>
    {/if}
    <form class="form-alta add-data" action="addGenero" method="post">
        <input placeholder="Nombre del genero" type="text" name="genero" id="genero" required>
        <input type="submit" class="btn btn-outline-primary" value="Guardar">
    </form>
    <table class="table table-generos table-striped table-hover table-light">
        <thead>

            <tr>
                <td colspan="3">genero</td>
            </tr>
        </thead>
        <tbody>
            {foreach from=$generos item=$genero}

            <tr>
                <td><a href="infoGenero/{$genero->id_genero}">{$genero->nombre_genero}</a></td>
                <td>
                    <form action="updateGenero/{$genero->id_genero}" method="post">
                        <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                        <input type="submit" class="btn btn-outline-secondary btn-sm" value="Editar">
                    </form>
                </td>
                <td>
                    <a class="btn btn-outline-danger btn-sm" href="deleteGenero/{$genero->id_genero}">Eliminar</a>
                </td>
            </tr>

            {/foreach}

            {else}
            <table class="table table-generos table-striped table-hover table-light">
                <thead>
                    <tr>
                        <td>genero</td>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$generos item=$genero}

                    <tr>
                        <td><a href="infoGenero/{$genero->id_genero}">{$genero->nombre_genero}</a></td>
                    </tr>
                    {/foreach}
                    {/if}
                </tbody>
            </table>
</div>
{include file='templates/footer.tpl'}