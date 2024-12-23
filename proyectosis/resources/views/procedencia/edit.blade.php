@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Procedencia
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Procedencia</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('procedencias.update', $procedencia->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('procedencia.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
