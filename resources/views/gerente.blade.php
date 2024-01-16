<x-app-layout>
    <div>
    <nav class="navbar bg-body-tertiary">
  <div style="margin-top: -80px; background:F3F4F6; margin-left:10px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin') }}">
              <i class="bi bi-house-door"></i>Ver Solicitudes
            </a>
          </li>
          
        </ul>
      </div>
    </div>
  </div>
</nav>
    </div>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mt-5">
                        <h2>Listado de Créditos Pendientes</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Valor</th>
                                    <th>Cuotas</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Opcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gerente as $credito)
                                    <tr>
                                        <td>{{ $credito->id }}</td>
                                        <td>{{ $credito->cliente }}</td>
                                        <td>{{ $credito->valor }}</td>
                                        <td>{{ $credito->cuotas }}</td>
                                        <td>{{ $credito->descripcion }}</td>
                                        <td class="{{ $credito->estado === 'pendiente' ? 'bg-warning' : '' }}">
                                            {{ $credito->estado }}
                                        </td>
                                        <td>
                                           <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAsignar{{ $credito->id }}">Asignar</button>
                                        </td>
                                        <div class="modal fade" id="modalAsignar{{ $credito->id }}" tabindex="-1" aria-labelledby="modalAsignarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAsignarLabel">Asignar Estado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('actualizar-estado', $credito->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="estado" class="form-label">Nuevo Estado</label>
                            <select class="form-select" id="estado" name="estado">
                                <option value="aprobado">Aprobado</option>
                                <option value="rechazado">Rechazado</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
