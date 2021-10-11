{include file='templates/header.tpl'}
{include file='templates/navbar.tpl'}
<div class="container">
<table class="table table-striped table-hover table-light">
    <thead>
        <tr>
            <td>Año</td>
            <td>Nombre</td>
            <td>Album</td>
            <td>Artista</td>
            <td>genero</td>
        </tr>

    </thead>
    <tbody>
        <tr>  
            <td>{$cancion->fecha}</td>
            <td>{$cancion->nombre}</td>
            <td>{$cancion->album}</td>
            <td>{$cancion->artista}</td>
            <td>{$cancion->nombre_genero}</td>
        </tr>
    </tbody>
</table>
<a href="../canciones"><button type="button" class="btn btn-outline-dark">Volver al listado</button></a>
</div>
{include file='templates/footer.tpl'}