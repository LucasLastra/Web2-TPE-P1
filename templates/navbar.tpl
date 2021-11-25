<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-nav">
            <a class="nav-link {if $pagina == 'home'}active{/if}" aria-current="page" href="/home">Inicio</a>
            <a class="nav-link {if $pagina == 'canciones'}active{/if}" aria-current="page"
                href="/canciones">Canciones</a>
            <a class="nav-link {if $pagina == 'generos'}active{/if}" aria-current="page" href="/generos">Géneros</a>

            {if !$logueado}
            <a class="nav-link {if $pagina == 'login'}active{/if}" href="/login">Log in</a>
            <a class="nav-link {if $pagina == 'signup'}active{/if}" href="/signup">Sign up</a>
            {else}
            <a class="nav-link" href="#">¡Hola, {$userName}!</a>
            {if $isAdmin}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {if $pagina == 'abmCanciones' || $pagina == 'abmGeneros'}active{/if}"
                    href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Administrar
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="dropdown-item"><a class="dropdown-item {if $pagina == 'abmCanciones'}active{/if}"
                            href="/abmCanciones">Administrar Canciones</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="dropdown-item"><a class="dropdown-item {if $pagina == 'abmGeneros'}active{/if}" 
                        href="/abmGeneros">Administrar Géneros</a>
                    </li>
                    <li class="dropdown-item"><a class="dropdown-item {if $pagina == 'abmUsuarios'}active{/if}" 
                        href="/abmUsuarios">Administrar Usuarios</a>
                    </li>
                </ul>
            </li>
            {/if}
            <a class="nav-link" href="/logout">Log out</a>
            {/if}
        </div>

</nav>