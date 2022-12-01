@if (Auth::user()->type == 'Member')
<li class="{{ Request::is('inscripciones*') ? 'active' : '' }}">
    <a href="{{ route('inscripciones.index') }}"><i class="fa fa-edit"></i><span>Incripción</span></a>
</li>
@endif

@if (Auth::user()->type == 'Admin')
    <li class="{{ Request::is('listado-inscripciones') ? 'active' : '' }}">
        <a href="{{ route('inscriptions.list') }}"><i class="fa fa-edit"></i><span>Inscripciones</span></a>
    </li>

    <li class="{{ Request::is('listado-inscripciones-revision-pendientes*') ? 'active' : '' }}">
        <a href="{{ route('pending.list') }}"><i class="fa fa-edit"></i><span>Revisiones Pendientes</span></a>
    </li>
    pending.list
@endif

