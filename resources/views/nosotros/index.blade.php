@extends('welcome')
@section('content')
        <div class="container">
            @foreach ($nosotros as $nos)
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1 style="text-align: center;">{{ $nos->nombre }}</h1>
                        </div>
                    </div>
                    <div class="row" style="text-align: center;">
                        <div class="col">
                            <label>{{ $nos->descripcion }}</label>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2 style="text-align: center;">Misión</h2>
                        </div>
                    </div>
                    <div class="row" style="text-align: center;">
                        <div class="col">
                            <label>{{ $nos->mision }}</label>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2 style="text-align: center;">Visión</h2>
                        </div>
                    </div>
                    <div class="row" style="text-align: center;">
                        <div class="col">
                            <label>{{ $nos->vision }}</label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection
