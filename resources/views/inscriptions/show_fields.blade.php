<div class="row">
    {{-- <div class="col-md-3">
        <div class="row">
            <div class="col-xs-6 col-md-3">
                {{-- <img src="{{ asset('storage/photography/' . $inscription->photography) }}" alt="..." class="thumbnail" width="250" height="250"> --}}

                {{-- @if (Auth::user()->type == 'Member')
                    <a href="{{ route('download.cv') }}" class="btn btn-info">Descargar CV</a>
                    <br><br>
                    <a href="{{ route('download.lifeguardnotebook') }}" class="btn btn-info">Descargar Libreta</a>
                @else
                    <a href="{{ route('cv.download.admin', $inscription->user_id) }}" class="btn btn-info">Descargar CV</a>
                    <br><br>
                    <a href="{{ route('lifeguardnotebook.download.admin', $inscription->user_id) }}" class="btn btn-info">Descargar Libreta</a>
                @endif 
            </div>
            
        </div>
    </div> --}}
    <!-- /.col -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Información Básica</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5">
                        <p><strong>Apellido y nombre: </strong>{{ $inscription->lastname }}, {{ $inscription->name }}</p>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Fecha de nacimiento: </strong>{{ date('d/m/Y', strtotime($inscription->birthday)) }}</p>
                    </div>
                    

                    <div class="col-md-6">
                        <p><strong>Sexo: </strong>{{ $inscription->sex }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Telefono: </strong>{{ $inscription->phone }}</p>
                    </div>
                    
                    <div class="col-md-6">
                        <p><strong>Email: </strong>{{ $inscription->email }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Estado civil: </strong>{{ $inscription->marital_state}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Ocupacion: </strong>{{ $inscription->occupation }}</p>
                    </div>
                    
                    <div class="col-md-6">
                        <p><strong>Ingresos: </strong>{{ $inscription->income }}</p>
                    </div>
                </div>

                <h3 class="box-title">DOMICILIO: </h3>
                <div class="row">
                    <div class="col-md-3">
                        <p><strong>Calle: </strong>{{ $inscription->street }}</p>
                    </div>
                    
                    <div class="col-md-2">
                        <p><strong>Nro.: </strong>{{ $inscription->number }}</p>
                    </div>
                    <div class="col-md-2">
                        <p><strong>Piso: </strong>{{ $inscription->floor }}</p>
                    </div>
                    
                    <div class="col-md-2">
                        <p><strong>Dpto.: </strong>{{ $inscription->apartment }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Localidad: </strong>{{ $inscription->city }}</p>
                    </div>
                    
                    <div class="col-md-6">
                        <p><strong>Cod. postal: </strong>{{ $inscription->postcode }}</p>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.box -->
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Información de Identidad</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                  

                    <div class="col-md-5">
                        <p><strong>Nro. Documento: </strong>{{ $inscription->document_number }}</p>
                    </div>
                    <div class="col-md-5">
                        <p><strong>CUIL: </strong>{{ $inscription->cuil}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('storage/front_document/' . $inscription->front_document) }}" alt="..." class="thumbnail" width="640" height="480">
                    </div>

                    <div class="col-md-12">
                        <img src="{{ asset('storage/back_document/' . $inscription->back_document) }}" alt="..." class="thumbnail" width="640" height="480">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box -->
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Estudios a realizar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Carrera: </strong>{{ $inscription->career }}</p>
                    </div>

                    <div class="col-md-6">
                        <p><strong>Establecimiento: </strong>{{ $inscription->establishment }}</p>
                       
                    </div>

                    <div class="col-md-6">
                        <p><strong>Cursara el año: </strong>{{ $inscription->career_year }}</p>
                      
                        {{-- <p><strong>Playa opcional: </strong>
                            @if ($inscription->optional_beach == null)
                                <span class="text-danger">Ninguna</span>
                            @else
                                <span>{{ $inscription->optional_beach }}</span>
                            @endif --}}
                    </div>

                    <div class="col-md-6">
                        <p><strong>Ciudad del establecimiento: </strong>{{ $inscription->establishment_city }}</p>
                    </div>

               
                    @if (Auth::user()->type == 'Member')
                        <div class="col-md-6">
                            <a href="{{ route('download.student.certificate') }}" class="btn btn-info">Descargar certificado alumno regular</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('download.anses.negative') }}" class="btn btn-info">Descargar negativa anses</a>
                        </div>
                    @else
                        <div class="col-md-6">
                            <a href="{{ route('student.certificate.download.admin', $inscription->user_id) }}" class="btn btn-info">Descargar certificado alumno regular</a>
                        </div>
                        
                        <div class="col-md-6">
                            <a href="{{ route('anses.negative.download.admin', $inscription->user_id) }}" class="btn btn-info">Descargar negativa anses</a>
                        </div>
                    @endif

                    {{-- <div class="col-md-12">
                        
                            <p><strong>Disponibilidad desde: </strong> 
                            @if ($inscription->availability_from != null)
                                {{ date('d/m/Y', strtotime($inscription->availability_from)) }}</p>
                            @else
                                <span>-</span>
                            @endif
                    </div> --}}

                    

                </div>
            </div>
        </div>

         <!--MADRE -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">DATOS DE LA TUTORA/MADRE</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5">
                        <p><strong>Apellido y nombre: </strong>{{ $inscription->mother_lastname }}, {{ $inscription->mother_name }}</p>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Fecha de nacimiento: </strong>{{ date('d/m/Y', strtotime($inscription->mother_birthday)) }}</p>
                    </div>
                    

                    <div class="col-md-6">
                        <p><strong>Sexo: </strong>{{ $inscription->mother_sex }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Telefono: </strong>{{ $inscription->mother_phone }}</p>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nro. Documento: </strong>{{ $inscription->mother_document_number }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>CUIL: </strong>{{ $inscription->mother_cuil}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Ocupacion: </strong>{{ $inscription->mother_occupation }}</p>
                    </div>
                    
                    <div class="col-md-6">
                        <p><strong>Ingresos: </strong>{{ $inscription->mother_income }}</p>
                    </div>
                </div>

                <h3 class="box-title">DOMICILIO: </h3>
                <div class="row">
                    <div class="col-md-3">
                        <p><strong>Calle: </strong>{{ $inscription->mother_street }}</p>
                    </div>
                    
                    <div class="col-md-2">
                        <p><strong>Nro.: </strong>{{ $inscription->mother_number }}</p>
                    </div>
                    <div class="col-md-2">
                        <p><strong>Piso: </strong>{{ $inscription->mother_floor }}</p>
                    </div>
                    
                    <div class="col-md-2">
                        <p><strong>Dpto.: </strong>{{ $inscription->mother_apartment }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Localidad: </strong>{{ $inscription->mother_city }}</p>
                    </div>
                    
                    <div class="col-md-6">
                        <p><strong>Cod. postal: </strong>{{ $inscription->mother_postcode }}</p>
                    </div>
                </div>

            </div>
        </div>



        <!--PADRE -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">DATOS DEL TUTOR/PADRE</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5">
                        <p><strong>Apellido y nombre: </strong>{{ $inscription->father_lastname }}, {{ $inscription->father_name }}</p>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Fecha de nacimiento: </strong>{{ date('d/m/Y', strtotime($inscription->father_birthday)) }}</p>
                    </div>
                    

                    <div class="col-md-6">
                        <p><strong>Sexo: </strong>{{ $inscription->father_sex }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Telefono: </strong>{{ $inscription->father_phone }}</p>
                    </div>
                    
                </div>

                <div class="row">
                  

                    <div class="col-md-6">
                        <p><strong>Nro. Documento: </strong>{{ $inscription->father_document_number }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>CUIL: </strong>{{ $inscription->father_cuil}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Ocupacion: </strong>{{ $inscription->father_occupation }}</p>
                    </div>
                    
                    <div class="col-md-6">
                        <p><strong>Ingresos: </strong>{{ $inscription->father_income }}</p>
                    </div>
                </div>

                <h3 class="box-title">DOMICILIO: </h3>
                <div class="row">
                    <div class="col-md-3">
                        <p><strong>Calle: </strong>{{ $inscription->father_street }}</p>
                    </div>
                    
                    <div class="col-md-2">
                        <p><strong>Nro.: </strong>{{ $inscription->father_number }}</p>
                    </div>
                    <div class="col-md-2">
                        <p><strong>Piso: </strong>{{ $inscription->father_floor }}</p>
                    </div>
                    
                    <div class="col-md-2">
                        <p><strong>Dpto.: </strong>{{ $inscription->father_apartment }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Localidad: </strong>{{ $inscription->father_city }}</p>
                    </div>
                    
                    <div class="col-md-6">
                        <p><strong>Cod. postal: </strong>{{ $inscription->father_postcode }}</p>
                    </div>
                </div>

            </div>
        </div>
         <!-- OTROS -->
         <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">OTROS DATOS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Recibia beca municipal con anterioridad?: </strong>{{ $inscription->scholarship }}</p>
                    </div>

                    <div class="col-md-6">
                        <p><strong>Vivienda: </strong>{{ $inscription->living_place }}</p>
                       
                    </div>

                    <div class="col-md-6">
                        <p><strong>Posee automovil: </strong>{{ $inscription->owns_car }}</p>
                      
                        {{-- <p><strong>Playa opcional: </strong>
                            @if ($inscription->optional_beach == null)
                                <span class="text-danger">Ninguna</span>
                            @else
                                <span>{{ $inscription->optional_beach }}</span>
                            @endif --}}
                    </div>

                    <div class="col-md-6">
                        <p><strong>Ciudad del establecimiento: </strong>{{ $inscription->establishment_city }}</p>
                    </div>

                    {{-- <div class="col-md-12">
                        
                            <p><strong>Disponibilidad desde: </strong> 
                            @if ($inscription->availability_from != null)
                                {{ date('d/m/Y', strtotime($inscription->availability_from)) }}</p>
                            @else
                                <span>-</span>
                            @endif
                    </div> --}}

                    

                </div>
            </div>
        </div>
        <!-- /.box -->
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Observaciones</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>Estado: </strong>
                            @if ($inscription->status == 'Revisión Pendiente')
                                <span class="text-info">Revisión Pendiente</span>
                            @elseif($inscription->status == 'Aceptada')
                                <span class="text-success">Aceptada</span>
                            @else
                                <span class="text-danger">Rechazada</span>
                            @endif
                        </p>
                    </div>

                    <div class="col-md-12">
                        <p><strong>Observaciones: </strong>
                            @if ($inscription->observations == null)
                                Sin observaciones
                            @else
                                {{ $inscription->observations }}
                            @endif
                        </p>
                    </div>

                    <div class="col-md-12">
                        @if (\Auth::user()->type == 'Member')
                            <a href="{{ route('inscripciones.index') }}" class="btn btn-default">Volver</a>
                        @else
                            @include('admin.observations')
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->