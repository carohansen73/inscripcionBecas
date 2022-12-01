@extends('layouts.app')

@section('title', $title)

@section('content')
    <section class="content-header">
        <h1>
            Nueva Inscripción
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'inscripciones.store', 'files' => true]) !!}

            @include('inscriptions.fields')

            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Enviar formulario para revisión</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {{-- <p class="help-block">Por favor, se solicita que antes de enviar el formulario compruebe que no falta ningún dato obligatorio (*) y que los archivos envíados cumplen con el formato indicado.</p>
                        <br><br>
                        {!! Form::label('adult', 'Acepto que soy mayor de 18 años') !!}
                        {!! Form::checkbox('adult', 1, false) !!}
                        <br><br> --}}
                        {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
                        <a href="{{ route('inscripciones.index') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        {!! Form::close() !!}
    </div>
@endsection
