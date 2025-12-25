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
    <link href="css/styles.css" rel="stylesheet" />
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
                    <h1 class="mt-4">LISTADO DE VENTAS</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <button type="button" class="btn btn-success btn-icon-split" id="OpenCreateModalVenta">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Agregar Ventas</span>
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
                            <table class="table" id="ventasTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Cliente</th>
                                        <th>Precio</th>
                                        <th>Fecha Venta</th>
                                        <th>Fecha Pagado</th>
                                        <th>Pagado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="ventasBody">
                                    @forelse ($ventas as $venta)
                                        <tr>
                                            <td>{{ $venta->id }}</td>
                                            <td>{{ $venta->usuario ? $venta->usuario->nombre : 'Usuario no encontrado' }}
                                            </td>
                                            <td>{{ $venta->precio ?? '' }}</td>
                                            <td>{{ $venta->fecha_venta ?? '' }}</td>
                                            <td>{{ $venta->fecha_pago ?? '' }}</td>
                                            <td>{{ $venta->pagado ? 'Pagado' : 'No Pagado' }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button class="btn btn-success btn-editVen"
                                                        data-idventas="{{ $venta->id }}"
                                                        data-precio="{{ $venta->precio ?? '' }}"
                                                        data-pagado="{{ $venta->pagado ?? 0 }}"
                                                        data-fechaventa="{{ $venta->fecha_venta ?? '' }}"
                                                        data-fechapago="{{ $venta->fecha_pago ?? '' }}"
                                                        data-cedula="{{ $venta->cedula ?? '' }}">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </button>

                                                    <button class="btn btn-danger btn-deleteVen"
                                                        data-idventas="{{ $venta->id }}">
                                                        <i class="fa-solid fa-trash "></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>SIN CONTENIDO</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Modal para crear Ventas CORRECTO -->
            <div class="modal fade" id="createModalVenta" tabindex="-1" aria-labelledby="createModalLabelVenta"
                aria-hidden="true">
                <div class="modal-dialog modal-lg"> <!-- Modal ancho -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Nueva Venta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('venta.store') }}" style="padding: 15px;">
                                @csrf

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="cedulaCliente" class="form-label">Cliente:</label>
                                        <select class="form-select" name="Cedula" required>
                                            <option value="" disabled selected>Seleccione un cliente</option>
                                            @foreach ($usuarios as $usuario)
                                                <option value="{{ $usuario->cedula }}">{{ $usuario->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="precioVenta" class="form-label">Precio:</label>
                                        <input type="float" step="0.01" class="form-control" name="Precio"
                                            required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="fechaVenta" class="form-label">Fecha Venta:</label>
                                        <input type="date" class="form-control" name="Fechaventa" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="fechaPago" class="form-label">Fecha Pago:</label>
                                        <input type="date" class="form-control" name="FechaPago">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="pagadoSelect" class="form-label">Pagado:</label>
                                    <select class="form-select" id="pagadoSelect" name="Pagado" required>
                                        <option value="" disabled selected>Seleccione estado de pago</option>
                                        <option value="1">Pagado</option>
                                        <option value="0">No pagado</option>
                                    </select>
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

            <!-- Modal para editar Ventas CORRECTO -->
            <div class="modal fade" id="editVentaModal" tabindex="-1" aria-labelledby="editVentaLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg"> <!-- Modal ancho igual que en creación -->
                    <div class="modal-content">
                        <form method="POST" id="editVentaForm" action="">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editVentaLabel">Editar Venta</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="editCedula" class="form-label">Cliente:</label>
                                        <input type="text" class="form-control" id="editCedula" name="Cedula"
                                            required minlength="10" maxlength="10">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="editPrecio" class="form-label">Precio:</label>
                                        <input type="number" step="0.01" class="form-control" id="editPrecio"
                                            name="Precio" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="editFechaVenta" class="form-label">Fecha Venta:</label>
                                        <input type="date" class="form-control" id="editFechaVenta"
                                            name="Fechaventa" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="editFechaPago" class="form-label">Fecha Pago:</label>
                                        <input type="date" class="form-control" id="editFechaPago"
                                            name="FechaPago">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="editPagado" class="form-label">Pagado:</label>
                                    <select class="form-select" id="editPagado" name="Pagado" required>
                                        <option value="" disabled selected>Seleccione estado de pago</option>
                                        <option value="1">Pagado</option>
                                        <option value="0">No pagado</option>
                                    </select>
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

            <!-- Modal para eliminar Ventas CORRECTO -->
            <div class="modal fade" id="deleteModalVenta" tabindex="-1" aria-labelledby="deleteVentaLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteVentaLabel">Eliminar Venta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="deleteVentaForm"
                                action="{{ route('venta.destroy', ['ventum' => '::id::']) }}">
                                @csrf
                                @method('DELETE')
                                <p>¿Estás seguro de que deseas eliminar esta venta?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        id="cancelDeleteVentaBtn">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scrip.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <!-- paginacion -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.2.1/datatables.min.js"></script>

    <!-- script modal crear CORRECTO FUNCIONAL -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const createModalVenta = new bootstrap.Modal(document.getElementById('createModalVenta'));
            const openCreateModalBtn = document.getElementById('OpenCreateModalVenta');
            const saveChangesBtn = createModalVenta._element.querySelector('button[type="submit"]');

            // Abrir modal al hacer clic en el botón
            openCreateModalBtn.onclick = () => createModalVenta.show();

            // Guardar cambios y cerrar el modal (si quieres cerrar al guardar)
            saveChangesBtn.onclick = () => {
                // Aquí podrías validar o hacer otra lógica antes de enviar
                document.querySelector('#createModalVenta form').submit(); // envía el formulario
                // createModalVenta.hide(); // Descomenta si quieres cerrar el modal sin enviar
            };
        });
    </script>

    <!-- script modal editar CORRECTO FUNCIONAL-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editForm = document.getElementById('editVentaForm');
            const modal = new bootstrap.Modal(document.getElementById('editVentaModal'));

            // Delegación global para compatibilidad con DataTables
            document.addEventListener('click', function(e) {
                const button = e.target.closest('.btn-editVen');
                if (button) {
                    const id = button.getAttribute('data-idventas');
                    const cedula = button.getAttribute('data-cedula');
                    const precio = button.getAttribute('data-precio');
                    const fechaVenta = button.getAttribute('data-fechaventa');
                    const fechaPago = button.getAttribute('data-fechapago');
                    const pagado = button.getAttribute('data-pagado');

                    editForm.action = `/venta/${id}`;
                    document.getElementById('editCedula').value = cedula;
                    document.getElementById('editPrecio').value = precio;
                    document.getElementById('editFechaVenta').value = fechaVenta;
                    document.getElementById('editFechaPago').value = fechaPago;
                    document.getElementById('editPagado').value = pagado;

                    modal.show();
                }
            });
        });
    </script>

    <!-- script modal eliminar CORRECTO FUNCIONAL-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModalVenta'));
            const deleteForm = document.getElementById('deleteVentaForm');
            const baseDeleteAction = deleteForm.getAttribute('action'); // debe contener ::id::

            // Delegación global para compatibilidad con DataTables
            document.addEventListener('click', function(e) {
                const button = e.target.closest('.btn-deleteVen');
                if (button) {
                    const id = button.getAttribute('data-idventas');
                    const action = baseDeleteAction.replace('::id::', id);
                    deleteForm.setAttribute('action', action);
                    deleteModal.show();
                }
            });
        });
    </script>

</body>

</html>
