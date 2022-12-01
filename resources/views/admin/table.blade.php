@section('css')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
@endsection

<div class="table-responsive">
    <table id="table" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Apellido y Nombre/s</th>
                <th>Documento</th>
                <th>Enviado</th>
                <th>Estado</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($inscriptions as $inscription)
            <tr>
                <td>{{ $inscription->lastname }}, {{ $inscription->name }}</td>
                <td>{{ $inscription->document_number }}</td>
                <td>{{ $inscription->updated_at }}</td>

                @if ($inscription->status == 'Revisión Pendiente')
                    <td class="text-info">Revisión Pendiente</td>
                @elseif($inscription->status == 'Aceptada')
                    <td class="text-success">Aceptada</td>
                @else
                    <td class="text-danger">Rechazada</td>
                @endif
                
                @if($inscription->observations == null)
                    <td >No</td>
                @else
                    <td class="text-success">Sí</td>
                @endif
                <td>
                    <div class='btn-group'>
                        <a href="{{ route('inscripciones.show', [$inscription->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@section('scripts')

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js" type="text/javascript"></script>

    <script>
        $("#table").DataTable({language:{sProcessing:"Procesando...",sLengthMenu:"Mostrar _MENU_ registros",sZeroRecords:"No se encontraron resultados",sEmptyTable:"Ningún dato disponible en esta tabla",sInfo:"Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",sInfoEmpty:"Mostrando del 0 al 0 de un total de 0 registros",sInfoFiltered:"(filtrado de un total de _MAX_ registros)",sInfoPostFix:"",sSearch:"Buscar:",sUrl:"",sInfoThousands:",",sLoadingRecords:"Cargando...",oPaginate:{sFirst:"Primero",sLast:"Último",sNext:"Siguiente",sPrevious:"Anterior"},oAria:{sSortAscending:": Activar para ordenar la columna de manera ascendente",sSortDescending:": Activar para ordenar la columna de manera descendente"},buttons:{colvis:"Visibles",pageLength:{_:"Mostrar %d Elementos","-1":"Mostrar todo"}}},dom:"Bfrtip",responsive:!0,lengthMenu:[[25,50,-1],["25 filas","50 filas","Mostrar todo"]],iDisplayLength:0,buttons:["pageLength","colvis",{extend:"excelHtml5",text:'<i class="fa fa-file-excel-o"></i>',titleAttr:"Excel"}]}),table.buttons().container().appendTo("#example_wrapper .col-sm-6:eq(0)");
    </script>
@endsection
