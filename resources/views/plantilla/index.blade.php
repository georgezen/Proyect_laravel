@extends('welcome')

@section('contenido')
   
    <div class="row">
      <div class="col-md-12">
          <form autocomplete="off" >
            <input type="hidden" name="id_usuario" id="id_usuario" value="">
          
        <label for="" class="label">Nombre</label>
        <input type="text" name="nombre" class="form-control" id="nombre">
        <label for="" class="label">apellidos</label>
        <input type="text" name="apellidos" class="form-control" id="apellidos">
        
        <input type="button" id="save" value="Guardar" class="btn btn-success">
      </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-5">
        <div class="card">
          <div class="card-body">
            
            <input type="text" name="search_val" id="search_val" placeholder="Busque algo">
            <input type="button" value="Filtrar" id="search" class="btn btn-success">
          </div>
        </div>
        
      </div>
      <div class="col-md-3"></div>
    </div>
  

    <div class="row">
        <div class="col-md-12">
            @include('plantilla.table')
        </div>
        <nav aria-label="Page navigation example" >
            <ul class="pagination pagina_num">
            </ul>
          </nav>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('dist/js/main.js')}}"></script>
@endsection
