<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Datos del postulante</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <!-- Name Field -->
        <div class="col-sm-6">
            {!! Field::text('name', $user->name, ['label' => 'Nombre/s *','maxlength' => 191]) !!}
        </div>

        <!-- Lastname Field -->
        <div class="col-sm-6">
            {!! Field::text('lastname', $user->lastname, ['label' => 'Apellido *','maxlength' => 191]) !!}
        </div>

        <!-- Email Field -->
        <div class="col-sm-6">
            {!! Field::email('email', $user->email, ['label' => 'Email *','maxlength' => 50]) !!}
        </div>

        <!-- Phone Field -->
        <div class="col-sm-6">
            {!! Field::text('phone', null, ['label' => 'Teléfono *','maxlength' => 191]) !!}
        </div>

        <!-- Birthday Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('birthday', 'Fecha de nacimiento *') !!}
            {!! Form::date('birthday', null, ['class' => 'form-control','id'=>'birthday']) !!}
        </div>

        @push('scripts')
            <script type="text/javascript">
                $('#birthday').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss',
                    useCurrent: false
                })
            </script>
        @endpush

        <!-- Sex Field -->
        <div class="col-sm-4">
            {!! Field::select('sex', ['Femenino' => 'Femenino', 'Masculino' => 'Masculino', 'Otro' => 'Otro'], null, ['empty' => 'Seleccione su sexo', 'label' => 'Sexo *']) !!}
        </div>
        
                <!-- EstadoCivil  -->
                <div class="col-sm-4">
                    {!! Field::select('marital_state', ['Soltera/o' => 'soltero', 'Casada/o' => 'casado', 'viuda/o' => 'viudo', 'Concubinato' => 'concubinato'], null, ['empty' => 'Seleccione un estado civil', 'label' => 'Estado civil *']) !!}
                </div>


        <!-- Document Number Field -->
        <div class="col-sm-6">
            {!! Field::text('document_number', null, ['label' => 'Nro. Documento *','maxlength' => 191]) !!}
        </div>
             <!-- Document Number Field -->
             <div class="col-sm-6">
                {!! Field::text('cuil', null, ['label' => 'Cuil *','maxlength' => 191]) !!}
            </div>

                <!-- Ocupacion -->
                <div class="col-sm-6">
                    {!! Field::text('occupation', null, ['label' => 'Ocupación*','maxlength' => 191]) !!}
                </div>
        
                <!-- Ingresos  -->
                <div class="col-sm-6 form-group ">
                    <div class="input-group col-lg-12">
                        {!! Field::text('income', null, ['style' => 'margin-bottom:0;', 'label' => 'Ingresos *','maxlength' => 191]) !!}
                    </div>
                    <p class="help-block ">Debe utilizar el signo punto (.) para separar los decimales.</p>
                </div>


        
        <!-- Certificado de anses (padre no se hace cargo)-->
        {{-- <div class="form-group col-sm-6">
            {!! Form::label('certificate', 'Certificado de incumplimiento de la cuota alimentaria ') !!}
            <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Seleccionar</span>
                    <input name="front_document" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">
                </span>
                <span class="form-control"></span>
            </div>
            <p class="help-block">Los formatos permitidos son jpg, png, jpeg. y pdf</p>
            @if ($errors->has('front_document'))
                <span class="text-danger">
                    {{ $errors->first('front_document') }}
                </span>
            @endif
        </div> --}}

        
        <!-- Front Document Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('front_document', 'Foto anversa documento *') !!}
            <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Seleccionar</span>
                    <input name="front_document" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">
                </span>
                @if ($inscription->front_document)
                    <span class="form-control">{{$inscription->front_document}}</span>
                @else
                    <span class="form-control"></span>
                @endif
            </div>
            <p class="help-block">Los formatos permitidos son jpg, png, jpeg.</p>
            @if ($errors->has('front_document'))
                <span class="text-danger">
                    {{ $errors->first('front_document') }}
                </span>
            @endif
           
           
        </div>

        
        <!-- Back Document Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('back_document', 'Foto reversa documento *') !!}
            <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Seleccionar</span>
                    <input name="back_document" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">
                </span>
                {{-- <span class="form-control"></span> --}}
                @if ($inscription->back_document)
                    <span class="form-control">{{$inscription->back_document}}</span>
                @else
                    <span class="form-control"></span>
                @endif

            </div>
            <p class="help-block">Los formatos permitidos son jpg, png, jpeg.</p>
            @if ($errors->has('back_document'))
                <span class="text-danger">
                    {{ $errors->first('back_document') }}
                </span>
            @endif
          
        </div>

        @if ($inscription->front_document || $inscription->back_document)
            <div class="form-group col-sm-12">
                <div class="col-md-6">
                    @if ($inscription->front_document)
                        <img src="{{ asset('storage/front_document/' . $inscription->front_document) }}" alt="..." class="thumbnail" width="640" height="480">
                    @endif
                </div>
                <div class="col-md-6">
                    @if ($inscription->back_document)
                        <img src="{{ asset('storage/back_document/' . $inscription->back_document) }}" alt="..." class="thumbnail" width="640" height="480">
                    @endif
                </div>
            </div>
        @endif

         <!-- Domicilio -->
        
            <h3 class="box-title">Domicilio</h3>
        
            <!-- Calle -->
            <div class="col-sm-6">
                {!! Field::text('street', null, ['label' => 'Calle *','maxlength' => 191]) !!}
            </div>
    
            <!-- Altura  -->
            <div class="col-sm-6">
                {!! Field::text('number', null, ['label' => 'Nro. *','maxlength' => 191]) !!}
            </div>

                <!-- piso -->
                <div class="col-sm-6">
                {!! Field::text('floor', null, ['label' => 'Piso ','maxlength' => 191]) !!}
            </div>
    
            <!-- dpto  -->
            <div class="col-sm-6">
                {!! Field::text('apartment', null, ['label' => 'Depto. ','maxlength' => 191]) !!}
            </div>
            <div class="col-sm-6">
                {!! Field::text('city', null, ['label' => 'Localidad *','maxlength' => 191]) !!}
            </div>
    
            <!-- Codigo postal  -->
            <div class="col-sm-6">
                {!! Field::text('postcode', null, ['label' => 'Cod. postal * ','maxlength' => 191]) !!}
            </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box-body -->

<!-- /.box -->

</div>

<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Estudios a realizar</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <!-- career -->
        <div class="col-sm-6">
            {!! Field::text('career', null, ['label' => 'Carrera *','maxlength' => 191]) !!}
        </div>


        <!-- courses the -->
        <div class="col-sm-6">
            {!! Field::text('career_year', null, ['label' => 'Cursara el año *','maxlength' => 191]) !!}
        </div>

        <!-- Establecimiento -->
        <div class="col-sm-6">
            {!! Field::text('establishment', null, ['label' => 'Establecimiento *','maxlength' => 191]) !!}
        </div>


        <!-- Ciudad  -->
        <div class="col-sm-6">
            {!! Field::text('establishment_city', null, ['label' => 'Ciudad *','maxlength' => 191]) !!}
        </div>

       
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


<!-- Datos de la madre -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Datos de la tutora/madre</h3>
    </div>
        <!-- /.box-header -->

      
    <!-- form start -->
    <div class="box-body">
        <!-- Name Field -->
        <div class="col-sm-6">
            {!! Field::text('mother_name', null, ['label' => 'Nombre/s *','maxlength' => 191]) !!}
        </div>

        <!-- Lastname Field -->
        <div class="col-sm-6">
            {!! Field::text('mother_lastname', null, ['label' => 'Apellido *','maxlength' => 191]) !!}
        </div>

        <!-- Phone Field -->
        <div class="col-sm-6">
            {!! Field::text('mother_phone', null, ['label' => 'Teléfono *','maxlength' => 191]) !!}
        </div>

        <!-- Birthday Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('mother_birthday', 'Fecha de nacimiento *') !!}
            {!! Form::date('mother_birthday', null, ['class' => 'form-control','id'=>'birthday']) !!}
        </div>

        @push('scripts')
            <script type="text/javascript">
                $('#birthday').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss',
                    useCurrent: false
                })
            </script>
        @endpush

        <!-- Sex Field -->
        <div class="col-sm-3">
            {!! Field::select('mother_sex', ['Femenino' => 'Femenino', 'Masculino' => 'Masculino', 'Otro' => 'Otro'], null, ['empty' => 'Seleccione su sexo', 'label' => 'Sexo *']) !!}
        </div>

        <!-- Document Number Field -->
        <div class="col-sm-6">
            {!! Field::text('mother_document_number', null, ['label' => 'Nro. Documento *','maxlength' => 191]) !!}
        </div>

            <!-- Cuil -->
            <div class="col-sm-6">
            {!! Field::text('mother_cuil', null, ['label' => 'Cuil *','maxlength' => 191]) !!}
        </div>

        <!-- Ocupacion -->
        <div class="col-sm-6">
            {!! Field::text('mother_occupation', null, ['label' => 'Ocupación*','maxlength' => 191]) !!}
        </div>

        <!-- Ingresos  -->
        <div class="col-sm-6 form-group ">
            <div class="input-group col-lg-12">
            {!! Field::text('mother_income', null, ['label' => 'Ingresos *','maxlength' => 191]) !!}
            <p class="help-block">Debe utilizar el signo punto (.) para separar los decimales.</p>
            </div>
        </div>

        <!-- Domicilio -->
        <h3 class="box-title">Domicilio</h3>

        <!-- Calle -->
        <div class="col-sm-6">
            {!! Field::text('mother_street', null, ['label' => 'Calle *','maxlength' => 191]) !!}
        </div>

        <!-- Altura  -->
        <div class="col-sm-6">
            {!! Field::text('mother_number', null, ['label' => 'Nro. *','maxlength' => 191]) !!}
        </div>

            <!-- piso -->
            <div class="col-sm-6">
            {!! Field::text('mother_floor', null, ['label' => 'Piso ','maxlength' => 191]) !!}
        </div>

        <!-- dpto  -->
        <div class="col-sm-6">
            {!! Field::text('mother_apartment', null, ['label' => 'Depto. ','maxlength' => 191]) !!}
        </div>

        
        <!-- Localidad-->
        <div class="col-sm-6">
            {!! Field::text('mother_city', null, ['label' => 'Localidad ','maxlength' => 191]) !!}
        </div>

        <!-- Codigo postal  -->
        <div class="col-sm-6">
            {!! Field::text('mother_postcode', null, ['label' => 'Cod. postal * ','maxlength' => 191]) !!}
        </div>

        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<!-- Datos del padre -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Datos del tutor/padre</h3>
    </div>
        <!-- /.box-header -->

      
    <!-- form start -->
    <div class="box-body">
        <!-- Name Field -->
        <div class="col-sm-6">
            {!! Field::text('father_name', null, ['label' => 'Nombre/s *','maxlength' => 191]) !!}
        </div>

        <!-- Lastname Field -->
        <div class="col-sm-6">
            {!! Field::text('father_lastname', null ,['label' => 'Apellido *','maxlength' => 191]) !!}
        </div>

        <!-- Phone Field -->
        <div class="col-sm-6">
            {!! Field::text('father_phone', null, ['label' => 'Teléfono *','maxlength' => 191]) !!}
        </div>

        <!-- Birthday Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('father_birthday', 'Fecha de nacimiento *') !!}
            {!! Form::date('father_birthday', null, ['class' => 'form-control','id'=>'birthday']) !!}
        </div>

        @push('scripts')
            <script type="text/javascript">
                $('#birthday').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss',
                    useCurrent: false
                })
            </script>
        @endpush

        <!-- Sex Field -->
        <div class="col-sm-3">
            {!! Field::select('father_sex', ['Femenino' => 'Femenino', 'Masculino' => 'Masculino', 'Otro' => 'Otro'], null, ['empty' => 'Seleccione su sexo', 'label' => 'Sexo *']) !!}
        </div>


        <!-- Document Number Field -->
        <div class="col-sm-6">
            {!! Field::text('father_document_number', null, ['label' => 'Nro. Documento *','maxlength' => 191]) !!}
        </div>

            <!-- Cuil -->
            <div class="col-sm-6">
            {!! Field::text('father_cuil', null, ['label' => 'Cuil *','maxlength' => 191]) !!}
        </div>

        <!-- Ocupacion -->
        <div class="col-sm-6">
            {!! Field::text('father_occupation', null, ['label' => 'Ocupación*','maxlength' => 191]) !!}
        </div>

        <!-- Ingresos  -->
        <div class="col-sm-6 form-group ">
            <div class="input-group col-lg-12">
                {!! Field::text('father_income', null, ['label' => 'Ingresos *','maxlength' => 191]) !!}
                <p class="help-block">Debe utilizar el signo punto (.) para separar los decimales.</p>
            </div>
        </div>

        <!-- Domicilio -->
        <h3 class="box-title">Domicilio</h3>

        <!-- Calle -->
        <div class="col-sm-6">
            {!! Field::text('father_street', null, ['label' => 'Calle *','maxlength' => 191]) !!}
        </div>

        <!-- Altura  -->
        <div class="col-sm-6">
            {!! Field::text('father_number', null, ['label' => 'Nro. *','maxlength' => 191]) !!}
        </div>

            <!-- piso -->
            <div class="col-sm-6">
            {!! Field::text('father_floor', null, ['label' => 'Piso ','maxlength' => 191]) !!}
        </div>

        <!-- dpto  -->
        <div class="col-sm-6">
            {!! Field::text('father_apartment', null, ['label' => 'Depto. ','maxlength' => 191]) !!}
        </div>
             
        <!-- Localidad-->
        <div class="col-sm-6">
            {!! Field::text('father_city', null, ['label' => 'Localidad ','maxlength' => 191]) !!}
        </div>

        <!-- Codigo postal  -->
        <div class="col-sm-6">
            {!! Field::text('father_postcode', null, ['label' => 'Cod. postal * ','maxlength' => 191]) !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Otros datos</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <!-- becado -->
        <div class="col-sm-6">
            {!! Field::select('scholarship', ['Si' => 'Si', 'No' => 'No'], null, ['empty' => 'Seleccione una opcion', 'label' => 'Recibia beca municipal con anterioridad? *']) !!}
        </div>


        <!-- courses the -->
        <div class="col-sm-6">
            {!! Field::select('living_place', ['Alquila' => 'Alquila', 'Propia' => 'Propia'], null, ['empty' => 'Seleccione una opcion', 'label' => 'Vivienda *']) !!}
        </div>

        <div class="col-sm-6">
            {!! Field::select('owns_car', ['Si' => 'Si', 'No' => 'No'], null, ['empty' => 'Seleccione una opcion', 'label' => 'Posee automovil? *']) !!}
        </div>

       
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

       
        {{-- <div class="col-sm-6">
            {!! Field::select('beach', ['Claromecó' => 'Claromecó', 'Orense' => 'Orense', 'Reta' => 'Reta'], null, ['empty' => 'Seleccione una playa', 'label' => 'Playa Postulante *']) !!}
        </div>

      
        <div class="col-sm-6">
            {!! Field::select('optional_beach', ['Claromecó' => 'Claromecó', 'Orense' => 'Orense', 'Reta' => 'Reta'], null, ['empty' => 'Seleccione una playa', 'label' => 'Playa Opcional']) !!}
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('availability_from', 'Disponibilidad desde *') !!}
            {!! Form::date('availability_from', null, ['class' => 'form-control','id'=>'availability_from']) !!}
            <p class="help-block">La disponibilidad horaria es de 9:00 horas a 19:00 horas</p>
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('availability_to', 'Disponibilidad hasta') !!}
            {!! Form::date('availability_to', null, ['class' => 'form-control','id'=>'availability_to']) !!}
            <p class="help-block">Completar en caso de tener limite de disponibilidad</p>
        </div>
        
          
          <div class="col-sm-6">
            {!! Field::text('shirt_size', null, ['label' => 'Talle remera *','maxlength' => 10]) !!}
        </div>

        
        <div class="col-sm-6">
            {!! Field::text('pants_size', null, ['label' => 'Talle pantalon *','maxlength' => 10]) !!}
        </div>
 --}}


  <!-- Photography Field -->
        {{-- <div class="form-group col-sm-6">
            {!! Form::label('photography', 'Su Foto *') !!}
            <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Seleccionar</span>
                    <input name="photography" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">
                </span>
                <span class="form-control"></span>
            </div>
            <p class="help-block">Los formatos permitidos son jpg, png, jpeg.</p>
            @if ($errors->has('photography'))
                <span class="text-danger">
                    {{ $errors->first('photography') }}
                </span>
            @endif
        </div> --}}
  
  

<!-- /.box -->