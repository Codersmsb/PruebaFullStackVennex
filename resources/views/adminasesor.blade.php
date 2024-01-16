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
            <a class="nav-link active" aria-current="page" href="{{route('admin')}}">
              <i class="bi bi-house-door"></i>Administrar Clientes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('adminasesor')}}">
              <i class="bi bi-house-door"></i> Administrar Asesores
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('admingerente')}}">
              <i class="bi bi-house-door"></i>Administrar Gerente
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
        
        <div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Código</th>
                <th>Area</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asesor as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->codigo }}</td>
                    <td>Asesor</td>
                    <td>
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal{{ $usuario->id }}">Editar</a>
       <div class="modal fade" id="editarModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="editarModalLabel{{ $usuario->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel{{ $usuario->id }}">Editar Gerente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para editar el gerente -->
                    <form method="POST" action="{{ route('actualizarUsuario', ['id' => $usuario->id]) }}">
                        @csrf
                        @method('PUT')

                        <!-- Campos del formulario -->
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" value="{{ $usuario->name }}" class="form-control" required>
                        <br>
                        <label for="codigo">Codigo:</label>
                        <input type="text" name="codigo" value="{{ $usuario->codigo }}" class="form-control" required>
                        <br>
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="{{ $usuario->email }}" class="form-control" required>
                        <br>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
    </td>
    <td>  <form method="POST" action="{{ route('eliminarUsuario', ['id' => $usuario->id]) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este gerente?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>