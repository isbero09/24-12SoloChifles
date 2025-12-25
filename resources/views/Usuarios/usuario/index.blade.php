<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SOLO CHIFLES</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="./css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Paginacion -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.2.1/datatables.min.css" rel="stylesheet">
    <!-- Estilos responsivos -->
    <style>
        /* Solo aplica en pantallas pequeñas (móviles) */
        @media (max-width: 768px) {

            /* Contenedor principal del encabezado */
            .datatable-top {
                display: flex;
                flex-direction: column;
                /* Apila los elementos verticalmente */
                align-items: center;
                /* Los centra */
                gap: 10px;
                /* Espacio entre el selector y el buscador */
            }

            /* El área del selector (10, 25, 50...) */
            .datatable-dropdown {
                width: 100%;
                text-align: center;
            }

            /* El área del buscador */
            .datatable-search {
                width: 100%;
                float: none !important;
                /* Quita la flotación a la derecha por defecto */
            }

            /* La cajita de texto del buscador */
            .datatable-input {
                width: 100%;
                /* Que ocupe todo el ancho disponible */
            }

            /* 1. Reducir el tamaño de la letra y el cuadro del selector */
            .datatable-selector {
                font-size: 14px !important;
                /* Letra más pequeña */
                padding: 2px 5px !important;
                /* Menos relleno (padding) */
                width: auto !important;
                /* Que se ajuste al contenido */
                height: 35px !important;
                /* Altura fija controlada */
            }

            /* 3. Asegurar que el buscador no se pegue */
            .datatable-search {
                margin-top: 10px;
            }
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
            </div>
        </form>
        <!-- Navbar usuario-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            Cerrar Sesión
                        </button>
                    </form>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="navbar-brand ps-3 mt-3 text-center" href="{{ route('inicio') }}"><img
                                src="{{ asset('img/logo transparebte.png') }}" alt="" width="80px"
                                height="75"></a>
                        <a class="navbar-brand ps-3 mt-4 text-center" href="{{ route('inicio') }}"><img
                                src="{{ asset('img/Diseño sin fondo.PNG') }}" alt="" width="165px"
                                height="55"></a>
                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Personas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('usuarios.index') }}">Clientes</a>
                                <a class="nav-link" href="{{ route('proveedores.index') }}">Proveedores</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseAdmi" aria-expanded="false" aria-controls="collapseAdmi">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                            Administración
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseAdmi" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('compras.index') }}">Compras</a>
                                <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                                <a class="nav-link" href="{{ route('produccion.index') }}">Produccion</a>
                                <a class="nav-link" href="{{ route('venta.index') }}">Ventas</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">LISTADO DE CLIENTES</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <button type="button" class="btn btn-success btn-icon-split"
                                id="OpenCreateModalUsuario">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Agregar Cliente</span>
                            </button>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            <button class="btn btn-primary float-end" onclick="window.print()">
                                <i class="fas fa-print"></i> Imprimir Reporte
                            </button>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table" id="usuariosTable">
                                <thead>
                                    <tr>
                                        <th>Cedula</th>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Referencia</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="usuariosBody">
                                    @forelse ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->cedula }}</td>
                                            <td>{{ $usuario->nombre }}</td>
                                            <td>{{ $usuario->direccion }}</td>
                                            <td>{{ $usuario->telefono }}</td>
                                            <td>{{ $usuario->referencia }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button class="btn btn-success btn-editUsuario"
                                                        data-idusuario="{{ $usuario->cedula }}"
                                                        data-cedula="{{ $usuario->cedula }}"
                                                        data-nombre="{{ $usuario->nombre ?? '' }}"
                                                        data-direccion="{{ $usuario->direccion ?? '' }}"
                                                        data-telefono="{{ $usuario->telefono ?? '' }}"
                                                        data-referencia="{{ $usuario->referencia ?? '' }}">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </button>

                                                    <button class="btn btn-danger btn-deleteUsuario"
                                                        data-cedula="{{ $usuario->cedula }}">
                                                        <i class="fa-solid fa-trash "></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">SIN CONTENIDO</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Modal para crear Usuario -->
            <div class="modal fade" id="createModalUsuario" tabindex="-1" aria-labelledby="createModalLabelUsuario"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Nuevo Cliente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('usuarios.store') }}" style="padding: 15px;">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="cedulaUsuario" class="form-label">Cédula:</label>
                                        <input type="text" class="form-control" name="Cedula" required
                                            minlength="10" maxlength="10">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="nombreUsuario" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" name="Nombre" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="direccionUsuario" class="form-label">Dirección:</label>
                                        <input type="text" class="form-control" name="Direccion">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="telefonoUsuario" class="form-label">Teléfono:</label>
                                        <input type="tel" class="form-control" name="Telefono" maxlength="10">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="referenciaUsuario" class="form-label">Referencia:</label>
                                        <input type="text" class="form-control" name="Referencia">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para editar Usuario -->
            <div class="modal fade" id="editUsuarioModal" tabindex="-1" aria-labelledby="editUsuarioLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="POST" id="editUsuarioForm" action="">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUsuarioLabel">Editar Cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="editCedula" class="form-label">Cédula:</label>
                                        <input type="text" class="form-control" id="editCedula" name="Cedula"
                                            required minlength="10" maxlength="10" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="editNombre" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="editNombre" name="Nombre"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="editDireccion" class="form-label">Dirección:</label>
                                        <input type="text" class="form-control" id="editDireccion"
                                            name="Direccion">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="editTelefono" class="form-label">Teléfono:</label>
                                        <input type="tel" class="form-control" id="editTelefono" name="Telefono"
                                            maxlength="10">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="editReferencia" class="form-label">Referencia:</label>
                                        <input type="text" class="form-control" id="editReferencia"
                                            name="Referencia">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal para eliminar Usuario -->
            <div class="modal fade" id="deleteModalUsuario" tabindex="-1" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Eliminar Cliente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="delete-form" action="">
                                @csrf
                                @method('DELETE')
                                <p>¿Estás seguro de que deseas eliminar este cliente?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        id="cancelDeleteBtn">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="{{ asset('js/scrip.js') }}"></script>
    <!-- paginacion -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.2.1/datatables.min.js"></script>

    <!-- script modal crear -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const createModalUsuario = new bootstrap.Modal(document.getElementById('createModalUsuario'));
            const openCreateModalBtn = document.getElementById('OpenCreateModalUsuario');
            const saveChangesBtn = createModalUsuario._element.querySelector('button[type="submit"]');

            // Abrir modal al hacer clic en el botón
            openCreateModalBtn.onclick = () => createModalUsuario.show();

            // Guardar cambios y cerrar el modal
            saveChangesBtn.onclick = (event) => {
                document.querySelector('#createModalUsuario form').submit();
            };
        });
    </script>

    <!-- script modal editar -->
    <script>
        $(document).on('click', '.btn-editUsuario', function() {
            const editForm = document.getElementById('editUsuarioForm');
            const modal = new bootstrap.Modal(document.getElementById('editUsuarioModal'));

            const button = this;
            const id = button.getAttribute('data-idusuario') || '';
            const cedula = button.getAttribute('data-cedula') || '';
            const nombre = button.getAttribute('data-nombre') || '';
            const direccion = button.getAttribute('data-direccion') || '';
            const telefono = button.getAttribute('data-telefono') || '';
            const referencia = button.getAttribute('data-referencia') || '';

            // Actualizar la acción del formulario
            editForm.action = `/usuarios/${id}`;

            // Llenar los campos del formulario
            document.getElementById('editCedula').value = cedula;
            document.getElementById('editNombre').value = nombre;
            document.getElementById('editDireccion').value = direccion;
            document.getElementById('editTelefono').value = telefono;
            document.getElementById('editReferencia').value = referencia;

            modal.show();
        });
    </script>

    <!-- script modal eliminar -->
    <script>
        $(document).on('click', '.btn-deleteUsuario', function() {
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModalUsuario'));
            const deleteForm = document.getElementById('delete-form');
            const button = this;
            const id = button.getAttribute('data-cedula');
            // Usar el ID directamente en la ruta
            deleteForm.setAttribute('action', `/usuarios/${id}`);
            deleteModal.show();
        });
    </script>

</body>

</html>
