{include file='templates/header.tpl'}

<div class="container container-abm">
    <h1>{$titulo}</h1>

    {if $msj != ''}
    <h3 class="alert-warning">{$msj}</h3>
    {/if}

    <table class="table table-generos table-striped table-hover table-light">
        <thead>

            <tr>
                <td colspan="6">Usuarios</td>
            </tr>
        </thead>
        <tbody>
            {foreach from=$usuarios item=$usuario}

            <tr>
                <td>{$usuario->nombre}</td>
                <td>
                    {if $usuario->esAdmin == 1}
                    Es Admin
                    {else}
                    No es admin
                    {/if}
                </td>
                <td>
                    <form action="updateUsuario/{$usuario->id_usuario}" method="post">
                        <input placeholder="nombre" type="text" name="nombre" id="nombre">
                           <label for="admin">Es admin</label>
                            <input type="checkbox" name="admin" id="admin">
                      
                            <input type="submit" class="btn btn-outline-secondary btn-sm" value="Editar">
                        
                    </form>
                </td>
                <td>
                    <a class="btn btn-outline-danger btn-sm" href="deleteUsuario/{$usuario->id_usuario}">Eliminar</a>
                </td>
            </tr>

            {/foreach}
                </tbody>
            </table>
</div>
{include file='templates/footer.tpl'}