@extends('layouts.app')

@section('template_title')
    {{ $procedencia->name ?? __('Show') . " " . __('Procedencia') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Procedencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('procedencias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $procedencia->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Bandera:</strong>
                                    <img src="{{ asset('storage').'/'.$procedencia->bandera }}" alt="foo" width="80">
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
