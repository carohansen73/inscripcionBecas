<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Agregar observaciones</button>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar observaciones</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($inscription, ['route' => ['observations.update', $inscription->id], 'method' => 'patch', 'files' => true]) !!}

                    {!! Field::select('status', ['Revisión Pendiente' => 'Revisión Pendiente', 'Aceptada' => 'Aceptada', 'Rechazada' => 'Rechazada'], null, ['empty' => 'Seleccione un estado', 'label' => 'Estado *']) !!}

                    {!! Field::textarea('observations', null, ['style' => 'resize:none']) !!}
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> --}}
                {!! Form::submit('Modificar', ['class' => 'btn btn-warning']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->