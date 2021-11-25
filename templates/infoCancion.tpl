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
                <td>genero</td>
            </tr>

        </thead>
        <input class="hide" value="{$cancion->id_cancion}" id="id">
        <input class="hide" value="{$isAdmin}" id="esAdmin">
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



    <h3>comentarios:</h3>

    <table class="table table-striped table-hover table-light">
        <thead>

            <tr>
                <td colspan="6">comentarios</td>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    {if $isAdmin}
    <div class="commentsbox-admin pt-3">
        <p>admin</p>
    </div>
    {elseif $logueado}

    <p>logueado</p>
    <form class="comments" method="POST">
        <label>Escriba su comentario</label>
        <textarea class="form-control" id="comentario" rows="5" required></textarea>
        <label>Puntuacion</label>
        <select id="puntuacion">
            <option value="1" selected>1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <input id="postComment" type="button" value="Enviar" class="btn btn-primary btn-comment">
        <input class="hide" value="{$cancion->id_cancion}" id="id">
        <input class="hide" value="{$isAdmin}" id="esAdmin">
    </form>


    {else if !$logueado}
        <p>no logueado</p>

    {/if}

    <div id='comentarios' class="commentsbox-user px-5">

    </div>

</div>

<script src="../js/comments.js"></script>
{include file='templates/footer.tpl'}