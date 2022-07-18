@extends('layouts.main', ['activePage' => 'calendarios', 'titlePage' => 'Calendarios'])

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
            <h4 class="card-title">Calendario</h4>
            <p class="card-category">Calendario de eventos</p>
          </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                        <div class="col-12 text-right">
                            <a href="{{ route('eventos.create') }}" class="btn btn-sm btn-facebook">Añadir evento</a>
                        </div>
                        
                    </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                  
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




@extends('layouts.app')
@section('content')

<div class="container">
    <div id="agenda">
        calendario
    </div>
</div>  

@endsection
