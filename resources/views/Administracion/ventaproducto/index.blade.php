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
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="index.html">Logout</a></li>
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
                                <a class="nav-link" href="{{ route('produccion.index') }}">Produccion</a>
                                <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                                <a class="nav-link" href="{{ route('venta.index') }}">Ventas</a>
                                <a class="nav-link" href="{{ route('ventaproducto.index') }}">Ventas-Productos</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">LISTADO DE VENTAS-PRODUCTOS</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <button type="button" class="btn btn-success btn-icon-split" id="OpenCreateModalVenpro">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Agregar Venta-Producto</span>
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
                        <div class="card-body">
                            <table class="table" id="venproTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Cliente</th>
                                        <th>Producto</th>
                                        <th>Detalle</th>
                                        <th>Precio Total</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="venproBody">
                                    @forelse ($ventasproductos as $ventaproducto)
                                        <tr>
                                            <td>{{ $ventaproducto->id }}</td>
                                            <td>{{ $ventaproducto->usuario ? $ventaproducto->usuario->nombres . ' ' . $ventaproducto->usuario->apellidos : 'Cliente no encontrado' }}</td>
                                            <td>{{ $ventaproducto->producto ? $ventaproducto->producto->nombre : 'Producto no encontrado' }}</td>
                                            <td>{{ $ventaproducto->detalle ?? '' }}</td>
                                            <td>{{ $ventaproducto->precio ?? '' }}</td>
                                            <td>{{ $ventaproducto->fecha ?? '' }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button class="btn btn-success btn-editVenpro"
                                                        data-idventa_producto="{{ $ventaproducto->id }}"
                                                        data-cliente="{{ $ventaproducto->cliente_cedula ?? '' }}"
                                                        data-producto="{{ $ventaproducto->producto_id ?? '' }}"
                                                        data-detalle="{{ $ventaproducto->detalle ?? '' }}"
                                                        data-precio="{{ $ventaproducto->precio ?? '' }}"
                                                        data-fecha="{{ $ventaproducto->fecha ?? '' }}">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </button>

                                                    <button class="btn btn-danger btn-deleteVenpro"
                                                        data-idventa_producto="{{ $ventaproducto->id }}">
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

            <!-- Modal para crear Ventas-Produtos CORRECTO-->
            <div class="modal fade" id="createModalVenpro" tabindex="-1" aria-labelledby="createModalLabelVenpro"
                aria-hidden="true">
                <div class="modal-dialog modal-lg"> <!-- Modal ancho -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Nueva Venta-Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('ventaproducto.store') }}" style="padding: 15px;">
                                @csrf

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="clienteVenpro" class="form-label">Cliente:</label>
                                        <select class="form-select" name="cliente" required>
                                            <option value="" disabled selected>Seleccione un cliente</option>
                                            @foreach($usuarios as $usuario)
                                                <option value="{{ $usuario->cedula }}">{{ $usuario->nombres }} {{ $usuario->apellidos }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="productoVenpro" class="form-label">Producto:</label>
                                        <select class="form-select" name="producto" required>
                                            <option value="" disabled selected>Seleccione un producto</option>
                                            @foreach($productos as $producto)
                                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="precioVenpro" class="form-label">Precio Total:</label>
                                        <input type="number" step="0.01" class="form-control" name="precio"
                                            required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="fechaVenpro" class="form-label">Fecha:</label>
                                        <input type="date" class="form-control" name="fecha" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="detalleVenpro" class="form-label">Detalle:</label>
                                    <textarea class="form-control" name="detalle" rows="3" required></textarea>
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

            <!-- Modal para editar Ventas-Produtos CORRECTO-->
            <div class="modal fade" id="editVenproModal" tabindex="-1" aria-labelledby="editVenproLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg"> <!-- Modal ancho igual que el de creación -->
                    <div class="modal-content">
                        <form method="POST" id="editVenproForm" action="">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editVenproLabel">Editar Venta-Producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="editCliente" class="form-label">Cliente:</label>
                                        <select class="form-select" id="editCliente" name="cliente" required>
                                            <option value="">Seleccione un cliente</option>
                                            @foreach($usuarios as $usuario)
                                                <option value="{{ $usuario->cedula }}">{{ $usuario->nombres }} {{ $usuario->apellidos }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="editProducto" class="form-label">Producto:</label>
                                        <select class="form-select" id="editProducto" name="producto" required>
                                            <option value="">Seleccione un producto</option>
                                            @foreach($productos as $producto)
                                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="editPrecio" class="form-label">Precio Total:</label>
                                        <input type="number" step="0.01" class="form-control" id="editPrecio"
                                            name="precio" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="editFecha" class="form-label">Fecha:</label>
                                        <input type="date" class="form-control" id="editFecha" name="fecha"
                                            required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="editDetalle" class="form-label">Detalle:</label>
                                    <textarea class="form-control" id="editDetalle" name="detalle" rows="3" required></textarea>
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

            <!-- Modal para eliminar Ventas-Produtos CORRECTO-->
            <div class="modal fade" id="deleteModalVenpro" tabindex="-1" aria-labelledby="deleteVenproLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteVenproLabel">Eliminar Venta-Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="deleteVenproForm"
                                action="{{ route('ventaproducto.destroy', ['ventaproducto' => '::id::']) }}">
                                @csrf
                                @method('DELETE')
                                <p>¿Estás seguro de que deseas eliminar esta venta-producto?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        id="cancelDeleteVenproBtn">Cancelar</button>
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
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <!-- script modal crear CORRECTO FUNCIONAL REVISAR LUEGO LO DEL NOMBRE DEL PRODUCTO-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const createModalVenpro = new bootstrap.Modal(document.getElementById('createModalVenpro'));
            const openCreateModalBtn = document.getElementById('OpenCreateModalVenpro');
            const saveChangesBtn = createModalVenpro._element.querySelector('button[type="submit"]');

            // Abrir modal al hacer clic en el botón
            openCreateModalBtn.onclick = () => createModalVenpro.show();

            // Guardar cambios y cerrar el modal (si quieres cerrar al guardar)
            saveChangesBtn.onclick = () => {
                // Aquí podrías validar o hacer otra lógica antes de enviar
                document.querySelector('#createModalVenpro form').submit(); // envía el formulario
                // createModalVenpro.hide(); // Descomenta si quieres cerrar el modal sin enviar
            };
        });
    </script>

    <!-- script modal editar CORRECTO FUNCIONAL-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editForm = document.getElementById('editVenproForm');
            const modal = new bootstrap.Modal(document.getElementById('editVenproModal'));

            document.getElementById('venproBody').addEventListener('click', function(e) {
                if (e.target.closest('.btn-editVenpro')) {
                    const button = e.target.closest('.btn-editVenpro');

                    const id = button.getAttribute('data-idventa_producto');
                    const cliente = button.getAttribute('data-cliente');
                    const producto = button.getAttribute('data-producto');
                    const precio = button.getAttribute('data-precio');
                    const fecha = button.getAttribute('data-fecha');
                    const detalle = button.getAttribute('data-detalle');

                    editForm.action = `/ventaproducto/${id}`;

                    document.getElementById('editCliente').value = cliente;
                    document.getElementById('editProducto').value = producto;
                    document.getElementById('editPrecio').value = precio;
                    document.getElementById('editFecha').value = fecha;
                    document.getElementById('editDetalle').value = detalle;

                    modal.show();
                }
            });
        });
    </script>

    <!-- script modal eliminar CORRECTO FUNCIONAL-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModalVenpro'));
            const deleteForm = document.getElementById('deleteVenproForm');
            const baseDeleteAction = deleteForm.getAttribute('action'); // debe contener ::id::

            document.getElementById('venproBody').addEventListener('click', function(e) {
                if (e.target.closest('.btn-deleteVenpro')) {
                    const button = e.target.closest('.btn-deleteVenpro');
                    const id = button.getAttribute('data-idventa_producto');
                    const action = baseDeleteAction.replace('::id::', id);
                    deleteForm.setAttribute('action', action);
                    deleteModal.show();
                }
            });
        });
    </script>

</body>

</html>
