{include file = 'templates/header.tpl'}
{if $pagina == 'abmCanciones'}
<div class="container-abm container">
    <h1>{$titulo}</h1>

    <form class="form-alta add-data" action="addCancion" method="post">
        <input placeholder="Año" type="text" name="fecha" id="fecha" required>
        <input placeholder="Nombre" type="text" name="nombre" id="nombre" required>
        <input placeholder="Album" type="text" name="album" id="album" required>
        <input placeholder="Artista" type="text" name="artista" id="artista" required>
        <input placeholder="Genero" type="text" name="genero" id="genero" required>
        <input type="submit" class="btn btn-outline-primary" value="Guardar">
    </form>
    <table class="table table-striped table-hover table-light">
        <thead>
            <tr>
                <td colspan="2">Año</td>
                <td colspan="2">Nombre</td>
                <td colspan="2">Album</td>
                <td colspan="2">Artista</td>
                <td colspan="2">genero</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            {foreach from=$canciones item=$cancion}
            <tr>
                <td>{$cancion->fecha}</td>
                <td>
                    <form action="updateCancion/{$cancion->id_cancion}" method="post">
                        <input placeholder="fecha" type="text" name="fecha" id="fecha" required>
                        <input type="submit" class="btn btn-outline-secondary btn-sm" value="Editar">
                    </form>
                </td>

                <td>{$cancion->nombre}</td>
                <td>
                    <form action="updateCancion/{$cancion->id_cancion}" method="post">
                        <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                        <input type="submit" class="btn btn-outline-secondary btn-sm" value="Editar">
                    </form>
                </td>

                <td>{$cancion->album}</td>
                <td>
                    <form action="updateCancion/{$cancion->id_cancion}" method="post">
                        <input placeholder="Album" type="text" name="album" id="album" required>
                        <input type="submit" class="btn btn-outline-secondary btn-sm" value="Editar">
                    </form>
                </td>

                <td>{$cancion->artista}</td>
                <td>
                    <form action="updateCancion/{$cancion->id_cancion}" method="post">
                        <input placeholder="Artista" type="text" name="artista" id="artista" required>
                        <input type="submit" class="btn btn-outline-secondary btn-sm" value="Editar">
                    </form>
                </td>

                <td>{$cancion->nombre_genero}</td>
                <td>
                    <form action="updateCancion/{$cancion->id_cancion}" method="post">
                        <input placeholder="Genero" type="text" name="genero" id="genero" required>
                        <input type="submit" class="btn btn-outline-secondary btn-sm" value="Editar">
                    </form>
                </td>

                <td>
                    <a class="btn btn-outline-danger btn-sm" href="deleteCancion/{$cancion->id_cancion}">Eliminar</a>
                </td>
            </tr>
            {/foreach}
            {else}
            <div class="container">
                <h1>{$titulo}</h1>
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
                        {foreach from=$canciones item=$cancion}
                        <tr>
                            <td>{$cancion->fecha}</td>
                            <td><a href="infoCancion/{$cancion->id_cancion}">{$cancion->nombre}</a></td>
                            <td>{$cancion->album}</td>
                            <td>{$cancion->artista}</td>
                            <td>{$cancion->nombre_genero}</td>
                        </tr>
                        {/foreach}
                        {/if}
                    </tbody>
                </table>
            </div>
            {include file = 'templates/footer.tpl'}