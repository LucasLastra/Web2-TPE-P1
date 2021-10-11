{include file='templates/header.tpl'}
{include file='templates/navbar.tpl'}

<div class="container">

    <h1>{$titulo}</h1>

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
                {foreach from=$canciones item=$cancion}
        
                <tr>  
                    <td>{$cancion->fecha}</td><button ></button>
                    <td><a href="infoCancion/{$cancion->id_cancion}">{$cancion->nombre}</a></td>
                    <td>{$cancion->album}</td>
                    <td>{$cancion->artista}</td>
                    <td>{$cancion->nombre_genero}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        </div>


</div>

{include file='templates/footer.tpl'}