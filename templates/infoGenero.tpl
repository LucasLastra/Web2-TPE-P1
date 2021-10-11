{include file='templates/header.tpl'}
{include file='templates/navbar.tpl'}
<div class="container">
<table class="table table-striped table-hover table-light">
    <thead>
        <tr>
            <td>genero</td>
        </tr>
    </thead>
    <tbody>
        <tr>  
            <td>{$genero->nombre_genero}</td>
        </tr>
    </tbody>
</table>
</div>
{include file='templates/footer.tpl'}