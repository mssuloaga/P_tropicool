@extends('layouts.main', ['activePage' => 'calendario', 'titlePage' => 'Calendario'])

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Calendario de eventos</h4>
            <p class="card-category">Registro de actividades</p>
          </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div id="agenda">
                    </div>   
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#calendario">
                      Launch
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="calendario" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" >

                                        <div class="form-group">
                                          <label for="id">ID:</label>
                                          <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                                          <small id="helpId" class="form-text text-muted">Help text</small>
                                        </div>



                                        <div class="form-group">
                                          <label for="title">Título</label>
                                          <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el titulo del evento">
                                          <small id="helpId" class="form-text text-muted">Help text</small>
                                        </div>

                                        <div class="form-group">
                                          <label for="descripcion">Descripción</label>
                                          <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                          <label for="">start</label>
                                          <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                                          <small id="helpId" class="form-text text-muted">Help text</small>
                                        </div>

                                        <div class="form-group">
                                          <label for="">end</label>
                                          <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                                          <small id="helpId" class="form-text text-muted">Help text</small>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                                    <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                                    <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="card-body">                            
            </div>
            </div>
                
            </div>
        </div>
    </div>
    </div>
      </div>
    </div>
  </div>
</div>
@endsection


