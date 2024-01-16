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


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Solicitar credito</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitar Credito</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('guardar-credito')}}" method="POST"> 
            @csrf

            <!-- Valor de credito -->
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Valor:</label>
            <input type="text" class="form-control" id="valor" name="valor">
          </div>

          <!-- Cuotas -->
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cuotas:</label>
            <select name="cuotas" class="form-control" id="cuotas">
                <option value="">Seleccionar</option>
                <option value="6">6</option>
                <option value="12">12</option>
                <option value="24">24</option>
                <option value="36">36</option>
            </select>
          </div>

          <!-- descripcion -->
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Descripcion:</label>
            <textarea name="descripcion" id="descripcion" cols="1" rows="2" class="form-control"></textarea>
          </div>

           <!-- Tipo de credito -->
           <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tipo de credito:</label>
            <select name="tipo_credito" class="form-control" id="tipo_credito">
                <option value="">Seleccionar</option>
                <option value="Libre inversion">Libre inversion</option>
                <option value="Vivienda">Vivienda</option>
            </select>
          </div>
          
         </div>
         <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Solicitar</button>
</div>
</form>

         
    </div>
  </div>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
