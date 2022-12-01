<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | {{ env('APP_NAME') }}</title>

    {{-- Tell the browser to be responsive to screen width --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

</head>
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Ingresar</h1>
                  </div>
                  {!! Form::open() !!}
                    <div class="form-group">
                      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                          {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'autofocus']) !!}
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          @if ($errors->has('email'))
                              <span class="help-block text-danger">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                          @endif
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                          {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          @if ($errors->has('password'))
                              <span class="help-block text-danger">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                          @endif

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Recordar</label>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">Ingresar</button>
                    
                  {!! Form::close() !!}
                  <br>
                  <br>
                  <br>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{ url('/password/reset') }}">Olvidé mi contraseña</a>
                    <br><br>
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{ route('register') }}">¿No tiene una cuenta? Crear cuenta</a>
                    <div class="alert alert-primary" role="alert">
                      La fecha de inscripción comenzará el 14/12/2022 hasta el 14/01/2023 inclusive.
                      Para consultas: prensa.hcd@tresarroyos.gov.ar <br> o 2983-439262 <br> (de 8:00 horas a 13:00 horas)
                    </div>
                    {{-- <div class="alert alert-primary" role="alert">
                      
                    </div> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
