<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-nav">
        <a class="nav-link {if $pagina == 'home'}active{/if}"  aria-current="page"  href="/home">Inicio</a>
        <a class="nav-link {if $pagina == 'canciones'}active{/if}" aria-current="page" href="/canciones">Canciones</a>
        <a class="nav-link {if $pagina == 'generos'}active{/if}" aria-current="page" href="/generos">Géneros</a>

        {if !isset($userName)}
        <a class="nav-link {if $pagina == 'login'}active{/if}" href="/login">Log in</a>
        <a class="nav-link {if $pagina == 'signup'}active{/if}" href="/signup">Sign up</a>
        {else}
        <a class="nav-link" href="#">¡Hola, {$userName}!</a>
        <a class="nav-link" href="/logout">Log out</a>
        {/if}
        

    </div>

</nav>