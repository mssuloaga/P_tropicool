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


