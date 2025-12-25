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
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">LISTADO DE PERMISOS</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <button type="button" class="btn btn-success btn-icon-split"
                                id="OpenCreateModalPermisos">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Agregar Permiso</span>
                            </button>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                        </div>
                        <div class="card-body">
                            <table class="table" id="permisosTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha Asignacion</th>
                                        <th>Usuario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="permisosBody">
                                    @forelse ($permisos as $permiso)
                                        <tr>
                                            <td>{{ $permiso->id }}</td>
                                            <td>{{ $permiso->fecha_asignacion ?? '' }}</td>
                                            <td>{{ $permiso->cedula ?? '' }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button class="btn btn-success btn-editPer"
                                                        data-idpermisos="{{ $permiso->id }}"
                                                        data-fechaasignacion="{{ $permiso->fecha_asignacion ?? '' }}"
                                                        data-cedula="{{ $permiso->cedula ?? '' }}">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </button>

                                                    <button class="btn btn-danger btn-deletePer"
                                                        data-idpermisos="{{ $permiso->id }}">
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

            <!--Modal para crear Permisos CORRECTO-->
            <div class="modal fade" id="createModalPermiso" tabindex="-1" aria-labelledby="createModalLabelPermiso"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Nuevo Permiso</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('permisos.store') }}" style="padding: 15px;">
                                @csrf
                                <div class="mb-3">
                                    <label for="fechaAsignacion" class="form-label">Fecha Asignación:</label>
                                    <input type="date" class="form-control" name="FechaAsignacion" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cedulaUsuario" class="form-label">Usuario:</label>
                                    <input type="text" class="form-control" name="Cedula" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" id="savePermiso">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para editar Permisos -->
            <div class="modal fade" id="editPermisoModal" tabindex="-1" aria-labelledby="editPermisoLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" id="editPermisoForm" action="">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPermisoLabel">Editar Permiso</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="editFechaAsignacion" class="form-label">Fecha Asignación:</label>
                                    <input type="date" class="form-control" id="editFechaAsignacion"
                                        name="FechaAsignacion" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editCedulaUsuario" class="form-label">Usuario:</label>
                                    <input type="text" class="form-control" id="editCedulaUsuario" name="Cedula"
                                        required>
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

            <!-- Modal para eliminar Permisos -->
            <div class="modal fade" id="deleteModalPermiso" tabindex="-1" aria-labelledby="deletePermisoLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deletePermisoLabel">Eliminar Permiso</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="deletePermisoForm"
                                action="{{ route('permisos.destroy', ['permiso' => '::id::']) }}">
                                @csrf
                                @method('DELETE')
                                <p>¿Estás seguro de que deseas eliminar este permiso?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        id="cancelDeletePermisoBtn">Cancelar</button>
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
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <!-- paginacion -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.2.1/datatables.min.js"></script>

    <!-- script modal crear CORRECTO FUNCIONAL-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const createModalPermiso = new bootstrap.Modal(document.getElementById('createModalPermiso'));
            const openCreateModalBtn = document.getElementById('OpenCreateModalPermisos');
            const saveChangesBtn = document.getElementById('savePermiso');

            // Abrir modal al hacer clic en el botón
            openCreateModalBtn.onclick = () => createModalPermiso.show();

            // Guardar cambios y cerrar el modal (si quieres cerrar al guardar)
            saveChangesBtn.onclick = () => {
                // Aquí podrías validar o hacer otra lógica antes de enviar
                document.querySelector('#createModalPermiso form').submit(); // envía el formulario
                // createModalPermiso.hide(); // Descomenta si quieres cerrar el modal sin enviar
            };
        });
    </script>

    <!-- script modal editar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editForm = document.getElementById('editPermisoForm');
            const modal = new bootstrap.Modal(document.getElementById('editPermisoModal'));

            document.addEventListener('click', function(e) {
                if (e.target.closest('.btn-editPer')) {
                    const button = e.target.closest('.btn-editPer');

                    const id = button.getAttribute('data-idpermisos');
                    const fechaAsignacion = button.getAttribute('data-fechaasignacion');
                    const cedula = button.getAttribute('data-cedula');

                    editForm.action = `/permisos/${id}`;

                    document.getElementById('editFechaAsignacion').value = fechaAsignacion;
                    document.getElementById('editCedulaUsuario').value = cedula;

                    modal.show();
                }
            });
        });
    </script>

    <!-- script modal eliminar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModalPermiso'));
            const deleteForm = document.getElementById('deletePermisoForm');
            const baseDeleteAction = deleteForm.getAttribute('action'); // debe contener ::id::

            document.addEventListener('click', function(e) {
                if (e.target.closest('.btn-deletePer')) {
                    const button = e.target.closest('.btn-deletePer');
                    const id = button.getAttribute('data-idpermisos');
                    const action = baseDeleteAction.replace('::id::', id);
                    deleteForm.setAttribute('action', action);
                    deleteModal.show();
                }
            });
        });
    </script>

</body>

</html>
