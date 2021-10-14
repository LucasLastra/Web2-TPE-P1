{include file='templates/header.tpl'}

<div class="container">
    <h1>{$titulo}</h1>
    <table class="table table-striped table-hover table-light">
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
        </tbody>
    </table>
</div>
{include file='templates/footer.tpl'}