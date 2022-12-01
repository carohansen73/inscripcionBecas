@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="content">
  @if (Auth::user()->type == 'Member')
    <!-- Main content -->
    <div class="callout callout-info">
      <h4>Bienvenido!</h4>
      Bienvenido al sistema de inscripción para Becas.
      <p>Para realizar la inscripción, debe dirigirse al panel situado a su izquierda, hacer click en el bóton inscripción, visualizará si posee inscripción realizada con anterioridad, de no poseer una, debe hacer click en el bóton nueva inscripción</p>
    </div>
  @else
  {{-- Small boxes (Stat box) --}}
  <div class="row">
    <div class="col-lg-3 col-xs-6">
        {{-- small box --}}
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3 class="counter">
                    {{ $total_inscriptions }}
                </h3>
                <p>
                  Inscrip. totales
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-edit"></i>
            </div>
            <a href="{{ route('inscriptions.list') }}" class="small-box-footer">
                Listado <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>{{-- ./col --}}

    <div class="col-lg-3 col-xs-6">
      {{-- small box --}}
      <div class="small-box bg-aqua">
          <div class="inner">
              <h3 class="counter">
                  {{ $total_pending_inscription }}
              </h3>
              <p>
                Inscrip. pendientes
              </p>
          </div>
          <div class="icon">
              <i class="fa fa-edit"></i>
          </div>
          <a href="{{ route('pending.list') }}" class="small-box-footer">
              Listado <i class="fa fa-arrow-circle-right"></i>
          </a>
      </div>
    </div>{{-- ./col --}}
  </div>

  @endif
  <!-- Main content -->
  {{--<div class="callout callout-info">
    <h4>Atención!</h4>
    <p>
      Ya se encuentra disponible para su descarga el listado de Guardavidas para la Temporada 20/21.
    </p>
  </div>
  <a class="btn btn-default" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('download.lifeguard.list') }}"><i class="fa fa-file-pdf-o"></i> Listado 05/12/20 al 07/03/21</a>

  <a class="btn btn-default" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('download.lifeguard.list19-12') }}"><i class="fa fa-file-pdf-o"></i> Listado 19/12/20 al 28/02/21</a>

  <a class="btn btn-default" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('download.lifeguard.list01-21') }}"><i class="fa fa-file-pdf-o"></i> Listado 01/01/21 al 28/02/21</a>
  
  <a class="btn btn-default" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('download.lifeguard.list.ext') }}"><i class="fa fa-file-pdf-o"></i> Listado Ext. 2021</a>
  --}}
</section>
@endsection
