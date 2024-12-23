@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? __('Show') . " " . __('Producto') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('productos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $producto->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $producto->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio:</strong><br>
                                    {{ $producto->precio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Stock:</strong><br>
                                    {{ $producto->stock }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Foto:</strong><br>
                                    <img  src="{{ asset('storage').'/'.$producto->foto }}" alt="foo" width="150"> 
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Clasificacion:</strong><br>
                                    {{ $producto->clasificacion->descripcion}}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Marca:</strong><br>
                                    
                                    {{ $producto->marca->nombre }}<br>
                                    <img src="{{ asset('storage').'/'.$producto->marca->logo }}" alt="foo" width="150"> 
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Procedencia:</strong><br>
                                    {{ $producto->procedencia->nombre }}<br>
                                    <img src="{{ asset('storage').'/'.$producto->procedencia->bandera }}" alt="foo" width="150">
                                </div>
                                <div>
                                    {{
                                        QrCode::size(200)->generate('https://www.youtube.com/watch?v=klxY2o0YE-w')
                                    }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
