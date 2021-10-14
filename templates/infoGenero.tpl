{include file='templates/header.tpl'}

<div class="container">
    <h2>{$titulo}</h2>
<table class="table table-striped table-hover table-light">
    <thead>
        <tr>
            <td>Año</td>
            <td>Nombre</td>
            <td>Album</td>
            <td>Artista</td>
        </tr>
    </thead>
    <tbody>  
        {foreach from=$genero item=$cancion}
        <tr> 
            <td>{$cancion->fecha}</td>
            <td><a href="../../infoCancion/{$cancion->id_cancion}">{$cancion->nombre}</a></td>
            <td>{$cancion->album}</td>
            <td>{$cancion->artista}</td>
        </tr>
        {/foreach}
    </tbody>
</table>
<a href="../generos"><button type="button" class="btn btn-outline-dark">Volver al listado</button></a>
</div>
{include file='templates/footer.tpl'}