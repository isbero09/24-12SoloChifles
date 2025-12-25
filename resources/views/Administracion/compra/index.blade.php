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
                    <h1 class="mt-4">LISTADO DE COMPRAS</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <button type="button" class="btn btn-success btn-icon-split" id="OpenCreateModalCompra">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Agregar Compra</span>
                            </button>
                        </div>
                    </div>

                    <!-- Sección de Compras a Crédito Pendientes -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <button class="btn btn-link text-start w-100 text-decoration-none text-black" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseCredito" aria-expanded="false"
                                aria-controls="collapseCredito">
                                <i class="fas fa-chevron-down me-2"></i>
                                <strong>Compras a crédito pendientes (cuentas por pagar)</strong>
                                <span class="badge bg-warning text-dark ms-2">{{ $comprasCredito->count() }}</span>
                            </button>
                        </div>
                        <div class="collapse" id="collapseCredito">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Proveedor</th>
                                                <th>Fecha Compra</th>
                                                <th>Fecha Vencimiento</th>
                                                <th>Total Pendiente</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($comprasCredito as $compraCredito)
                                                @php
                                                    // Calcular fecha de vencimiento
                                                    $fechaVencimiento = null;
                                                    if ($compraCredito->fecha && $compraCredito->dias_de_credito) {
                                                        $fecha = \Carbon\Carbon::parse($compraCredito->fecha);
                                                        $fechaVencimiento = $fecha->addDays($compraCredito->dias_de_credito)->format('Y-m-d');
                                                    }
                                                    
                                                    // Calcular total pendiente
                                                    $totalPendiente = 0;
                                                    if ($compraCredito->cantidad && $compraCredito->costo_unitario) {
                                                        $totalPendiente = $compraCredito->cantidad * floatval($compraCredito->costo_unitario);
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>{{ $compraCredito->proveedor ? $compraCredito->proveedor->nombre : 'N/A' }}</td>
                                                    <td>{{ $compraCredito->fecha ? \Carbon\Carbon::parse($compraCredito->fecha)->format('d/m/Y') : 'N/A' }}</td>
                                                    <td>
                                                        @if ($fechaVencimiento)
                                                            {{ \Carbon\Carbon::parse($fechaVencimiento)->format('d/m/Y') }}
                                                            @if (\Carbon\Carbon::parse($fechaVencimiento)->isPast())
                                                                <span class="badge bg-danger ms-2">Vencido</span>
                                                            @elseif (\Carbon\Carbon::parse($fechaVencimiento)->diffInDays(now()) <= 7)
                                                                <span class="badge bg-warning text-dark ms-2">Por vencer</span>
                                                            @endif
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <strong>${{ number_format($totalPendiente, 2, '.', ',') }}</strong>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No hay compras a crédito pendientes</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                        @if ($comprasCredito->count() > 0)
                                            <tfoot class="table-secondary">
                                                <tr>
                                                    <td colspan="3" class="text-end"><strong>Total General:</strong></td>
                                                    <td>
                                                        <strong>
                                                            ${{ number_format($comprasCredito->sum(function($compra) {
                                                                return ($compra->cantidad ?? 0) * floatval($compra->costo_unitario ?? 0);
                                                            }), 2, '.', ',') }}
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        @endif
                                    </table>
                                </div>
                            </div>
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
                            <table class="table" id="comprasTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Insumo</th>
                                        <th>Proveedor</th>
                                        <th>Cantidad</th>
                                        <th>Unidad</th>
                                        <th>Costo Unitario</th>
                                        <th>Tipo de Pago</th>
                                        <th>Días de Crédito</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="comprasBody">
                                    @forelse ($compras as $compra)
                                        <tr>
                                            <td>{{ $compra->id }}</td>
                                            <td>{{ $compra->fecha ?? '' }}</td>
                                            <td>{{ $compra->insumo ?? '' }}</td>
                                            <td>{{ $compra->proveedor ? $compra->proveedor->nombre : 'N/A' }}</td>
                                            <td>{{ $compra->cantidad ?? '' }}</td>
                                            <td>{{ $compra->unidad ?? '' }}</td>
                                            <td>{{ $compra->costo_unitario ?? '' }}</td>
                                            <td>{{ $compra->tipo_de_pago ?? '' }}</td>
                                            <td>{{ $compra->dias_de_credito ?? '' }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button class="btn btn-success btn-editCompra"
                                                        data-id="{{ $compra->id }}"
                                                        data-fecha="{{ $compra->fecha ?? '' }}"
                                                        data-insumo="{{ $compra->insumo ?? '' }}"
                                                        data-proveedor="{{ $compra->proveedor_id ?? '' }}"
                                                        data-cantidad="{{ $compra->cantidad ?? '' }}"
                                                        data-unidad="{{ $compra->unidad ?? '' }}"
                                                        data-costo-unitario="{{ $compra->costo_unitario ?? '' }}"
                                                        data-tipo-de-pago="{{ $compra->tipo_de_pago ?? '' }}"
                                                        data-dias-de-credito="{{ $compra->dias_de_credito ?? '' }}">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </button>

                                                    <button class="btn btn-danger btn-deleteCompra"
                                                        data-id="{{ $compra->id }}">
                                                        <i class="fa-solid fa-trash "></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">SIN CONTENIDO</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Modal de Compras Crear -->
            <div class="modal fade" id="createModalCompra" tabindex="-1" aria-labelledby="createModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Nueva Compra</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('compras.store') }}" style="padding: 15px;">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fechaCom" class="form-label">Fecha:</label>
                                        <input type="date" class="form-control" name="Fecha" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="insumoCom" class="form-label">Insumo:</label>
                                        <input type="text" class="form-control" name="Insumo" required placeholder="Platano verde, aceite, etc.">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="proveedorCom" class="form-label">Proveedor:</label>
                                        <select class="form-select" name="Proveedor" required>
                                            <option value="" disabled selected>Seleccione un proveedor</option>
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cantidadCom" class="form-label">Cantidad:</label>
                                        <input type="number" class="form-control" name="Cantidad" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="unidadCom" class="form-label">Unidad:</label>
                                        <input type="text" class="form-control" name="Unidad" placeholder="Saco, Kg, Litro, etc.">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="costoUnitarioCom" class="form-label">Costo Unitario:</label>
                                        <input type="text" class="form-control" name="CostoUnitario">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tipoPagoCom" class="form-label">Tipo de Pago:</label>
                                        <select class="form-select" name="TipoDePago">
                                            <option value="" disabled selected>Seleccione tipo de pago</option>
                                            <option value="contado">Contado</option>
                                            <option value="credito">Crédito</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="diasCreditoCom" class="form-label">Días de Crédito:</label>
                                        <input type="number" class="form-control" name="DiasDeCredito" min="0">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" id="saveChanges">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal de Compras Editar -->
            <div class="modal fade" id="editCompraModal" tabindex="-1" aria-labelledby="editCompraLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="POST" id="editCompraForm" action="">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editCompraLabel">Editar Compra</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="editFecha" class="form-label">Fecha:</label>
                                        <input type="date" class="form-control" id="editFecha" name="Fecha" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="editInsumo" class="form-label">Insumo:</label>
                                        <input type="text" class="form-control" id="editInsumo" name="Insumo" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="editProveedor" class="form-label">Proveedor:</label>
                                        <select class="form-select" id="editProveedor" name="Proveedor" required>
                                            <option value="" disabled>Seleccione un proveedor</option>
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="editCantidad" class="form-label">Cantidad:</label>
                                        <input type="number" class="form-control" id="editCantidad" name="Cantidad"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="editUnidad" class="form-label">Unidad:</label>
                                        <input type="text" class="form-control" id="editUnidad" name="Unidad">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="editCostoUnitario" class="form-label">Costo Unitario:</label>
                                        <input type="text" class="form-control" id="editCostoUnitario"
                                            name="CostoUnitario">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="editTipoPago" class="form-label">Tipo de Pago:</label>
                                        <select class="form-select" id="editTipoPago" name="TipoDePago">
                                            <option value="" disabled>Seleccione tipo de pago</option>
                                            <option value="contado">Contado</option>
                                            <option value="credito">Crédito</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="editDiasCredito" class="form-label">Días de Crédito:</label>
                                        <input type="number" class="form-control" id="editDiasCredito"
                                            name="DiasDeCredito" min="0">
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

            <!-- Modal para eliminar compra -->
            <div class="modal fade" id="deleteModalCompra" tabindex="-1" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Eliminar Compra</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="delete-form" action="">
                                @csrf
                                @method('DELETE')
                                <p>¿Estás seguro de que deseas eliminar esta compra?</p>
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
    <script src="{{ asset('js/scrip.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.2.1/datatables.min.js"></script>

    <!-- script modal crear -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const createModalCompra = new bootstrap.Modal(document.getElementById('createModalCompra'));
            const openEditModalBtn = document.getElementById('OpenCreateModalCompra');
            const saveChangesBtn = document.getElementById('saveChanges');

            // Abrir modal al hacer clic en el botón
            openEditModalBtn.onclick = () => createModalCompra.show();

            // Guardar cambios y cerrar el modal
            saveChangesBtn.onclick = () => {
                document.querySelector('#createModalCompra form').submit();
            };
        });
    </script>

    <!-- Script modal editar -->
    <script>
        $(document).on('click', '.btn-editCompra', function() {
            const editForm = document.getElementById('editCompraForm');
            const modal = new bootstrap.Modal(document.getElementById('editCompraModal'));

            const button = this;
            const id = button.getAttribute('data-id');
            const fecha = button.getAttribute('data-fecha') || '';
            const insumo = button.getAttribute('data-insumo') || '';
            const proveedor = button.getAttribute('data-proveedor') || '';
            const cantidad = button.getAttribute('data-cantidad') || '';
            const unidad = button.getAttribute('data-unidad') || '';
            const costoUnitario = button.getAttribute('data-costo-unitario') || '';
            const tipoPago = button.getAttribute('data-tipo-de-pago') || '';
            const diasCredito = button.getAttribute('data-dias-de-credito') || '';

            editForm.action = `/compras/${id}`;

            document.getElementById('editFecha').value = fecha;
            document.getElementById('editInsumo').value = insumo;
            document.getElementById('editProveedor').value = proveedor;
            document.getElementById('editCantidad').value = cantidad;
            document.getElementById('editUnidad').value = unidad;
            document.getElementById('editCostoUnitario').value = costoUnitario;
            document.getElementById('editTipoPago').value = tipoPago;
            document.getElementById('editDiasCredito').value = diasCredito;

            modal.show();
        });
    </script>

    <!--Script modal eliminar -->
    <script>
        $(document).on('click', '.btn-deleteCompra', function() {
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModalCompra'));
            const deleteForm = document.getElementById('delete-form');
            const button = this;
            const id = button.getAttribute('data-id');
            deleteForm.setAttribute('action', `/compras/${id}`);
            deleteModal.show();
        });
    </script>

    <!-- Script para cambiar ícono del acordeón de créditos -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const collapseCredito = document.getElementById('collapseCredito');
            const toggleButton = document.querySelector('[data-bs-target="#collapseCredito"]');
            const icon = toggleButton.querySelector('i');

            collapseCredito.addEventListener('show.bs.collapse', function() {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            });

            collapseCredito.addEventListener('hide.bs.collapse', function() {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            });
        });
    </script>
</body>

</html>
