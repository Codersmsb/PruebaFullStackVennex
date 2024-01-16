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
            <a class="nav-link active" aria-current="page" href="{{route('ver-creditos')}}">
              <i class="bi bi-house-door"></i> Mis creditos
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('solicitar-creditos')}}">
              <i class="bi bi-house-door"></i> Solicitar creditos
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-rZ5OB6aQKTZ7AD6M+OsBZzkt9v5OfbO4k1J0QbGiO3I5I6EGHqD9QCA9msM7cPvL" crossorigin="anonymous">


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
     
    <div class="container mt-5">
        <h2>Listado de Créditos</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Valor</th>
                    <th>Cuotas</th>
                    <th>Estado</th>
                    <th>Opcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($creditos as $credito)
                    <tr>
                        <td>{{ $credito->id }}</td>
                        <td>{{ $credito->cliente }}</td>
                        <td>{{ $credito->valor }}</td> 
                        <td>{{ $credito->cuotas }}</td>
                        <td class="{{ $credito->estado === 'pendiente' ? 'bg-warning' : ($credito->estado === 'aprobado' ? 'bg-success' : ($credito->estado === 'rechazado' ? 'bg-danger' : 'bg-info')) }}">
                           {{ $credito->estado }}
                        </td>
                        <td>
                            @if ($credito->estado != 'aprobado')
                                <button class="btn btn-danger" onclick="eliminarCredito({{ $credito->id }})">Cancelar</button>
                            @endif
                            @if ($credito->estado == 'aprobado')
                                <h1 class="btn btn-danger">No se puede cancelar</h1>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <form id="formEliminarCredito" action="{{ route('eliminar-credito') }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="credito_id" id="credito_id">
    </form>
    <script>
        function eliminarCredito(creditoId) {
            // Preguntamos al usuario si realmente quiere eliminar el crédito
            if (confirm('¿Estás seguro de que deseas eliminar este crédito?')) {
                // Llenamos el campo de crédito_id en el formulario y lo enviamos
                document.getElementById('credito_id').value = creditoId;
                document.getElementById('formEliminarCredito').submit();
            }
        }
    </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
