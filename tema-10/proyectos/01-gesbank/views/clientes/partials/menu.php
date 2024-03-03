<nav class="navbar navbar-expand-lg bg-body-tertiary"> 
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>cliente">Clientes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>clientes/new">Nuevo</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Ordenar
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= URL ?>cliente/order/1">Id</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>cliente/order/2">cliente</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>cliente/order/3">Email</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>cliente/order/4">Teléfono</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>cliente/order/5">Población</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>cliente/order/6">DNI</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>cliente/order/7">Edad</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>cliente/order/8">Curso</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (!in_array($_SESSION['id_rol'], $GLOBALS['cliente']['export'])) ? 'disabled' : '' ?>"
                        href="<?= URL ?>clientes/export"
                        onclick="return confirm('Se va a proceder a la exportación de los datos. ¿Desea continuar?')">
                        Exportar</a>
                </li>
                <li class="nav-item">
                    <button type="button"
                        class="nav-link btn btn-link <?= (!in_array($_SESSION['id_rol'], $GLOBALS['cliente']['import'])) ? 'disabled' : '' ?>"
                        data-bs-toggle="modal" data-bs-target="#importModalClientes">Importar</button>
                </li>
                <li class="nav-item">
                            <a class="nav-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['cliente']['pdf']) || in_array($_SESSION['id_rol'], $GLOBALS['clientes']['pdf'])) ? 'active' : 'disabled' ?>" aria-current="page" href="<?= URL ?>clientes/pdf">PDF</a>
                         </li>

            </ul>
            <form class="d-flex" role="search" method="GET" action="<?= URL ?>cliente/filter">
                <input class="form-control me-2" type="search"  aria-label="Search" name="expresion">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>