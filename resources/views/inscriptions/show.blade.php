@extends('layouts.app')

@section('title', $title)

@section('content')
    <section class="content-header">
        <h1>
            Inscripción de {{ $inscription->lastname }}, {{ $inscription->name }}
        </h1>
    </section>
    <div class="content">
        @include('inscriptions.show_fields')
    </div>
@endsection
