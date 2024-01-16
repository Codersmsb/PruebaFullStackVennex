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
        <div class="container">
        <div class="container">
        <h2>Listado de Créditos</h2>
 
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Crear Asesor</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      
    <form method="POST" action="{{ route('crear-asesor') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Codigo  -->
        <div>
            <x-input-label for="name" :value="__('Codigo')" />
            <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')" required autofocus autocomplete="codigo" />
            <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Combo box (Select) -->
<div class="mt-4">
    <x-input-label for="fullacces" :value="__('Acceso')" />
    <select id="fullacces" name="fullacces" class="block mt-1 w-full">
    <option value="asesor">Asesor</option>
       
    </select>
    <!-- Agrega el mensaje de error si es necesario -->
</div>

        <!-- Password -->
        <div class="mt-4">  
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
            
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
   
    </div>
  </div>
</div>




        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Valor</th>
                    <th>Cuotas</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Responsable Aprobacion Gerente</th>
                    <th>Fecha Aprobación</th>
                    <th>Tipo de Crédito</th>
                    <th>Observación Asesor</th>
                    <th>Nombre Asesor</th>
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
                        <td>{{ $credito->descripcion }}</td>
                        <td class="{{ $credito->estado === 'pendiente' ? 'bg-warning' : ($credito->estado === 'aprobado' ? 'bg-success' : ($credito->estado === 'rechazado' ? 'bg-danger' : 'bg-info')) }}">
                           {{ $credito->estado }}
                        </td>
                        <td>{{ $credito->nombre_gerente }}</td>
                        <td>{{ $credito->fecha_aprobacion ? $credito->fecha_aprobacion->format('Y-m-d H:i:s') : '-' }}</td>
                        <td>{{ $credito->tipo_credito }}</td>
                        <td>{{ $credito->observacion_asesor }}</td>
                        <td>{{ $credito->nombre_asesor }}</td>
                        <td><a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal{{ $credito->id }}">Asignar</a></td>
<!-- Modal de edición -->
<div class="modal fade" id="editarModal{{ $credito->id }}" tabindex="-1" aria-labelledby="editarModalLabel{{ $credito->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel{{ $credito->id }}">Editar Crédito #{{ $credito->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Aquí debes incluir los campos que quieres editar -->
                    <form id="formEditar{{ $credito->id }}" action="{{ route('editar-credito', ['id' => $credito->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Campos editables -->
                        <div class="mb-3">
                            <label for="estado">Estado:</label>
                            <select name="estado" class="form-control" id="estado{{ $credito->id }}">
                              <option value="">Seleccionar</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="rechazado">Rechazado</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nombre_asesor">Nombre Asesor:</label>
                            <input type="text" class="form-control" id="nombre_asesor{{ $credito->id }}" name="nombre_asesor" value="{{ Auth::user()->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="observacion_asesor">Observación Asesor:</label>
                            <textarea class="form-control" id="observacion_asesor{{ $credito->id }}" name="observacion_asesor">{{ $credito->observacion_asesor }}</textarea>
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
</x-app-layout>
