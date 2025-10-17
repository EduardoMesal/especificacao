<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <title>Mesal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="{{ mixAssets('assets/css/plugins.bundle.css') }}" />
    <link rel="stylesheet" href="{{ mixAssets('assets/css/style.bundle.css') }}" />
    <link rel="stylesheet" href="{{ mixAssets('assets/css/style.css') }}" />
</head>

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="authImg d-flex flex-column flex-column-fluid">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <form class="form w-100" method="POST" action="{{route('forgotPassword.action')}}">
                        @csrf
                        <div class="text-center mb-3">
                            <a href="{{route('login')}}" class="mb-12">
                                <img alt="Logo" src="{{ mixAssets('assets/img/logo.png') }}" class="w-120px" />
                            </a>
                            <h2 class="text-dark mt-6 mb-3">Recuperar senha</h1>
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">E-mail</label>
                            <input id="email" value="{{ old('email') }}" class="form-control form-control-lg form-control-solid" type="text" name="email" />
                        </div>

                        <div class="text-center mb-5">
                            <button id="btn-login" type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Enviar</span>
                            </button>
                        </div>
                        
                        @if($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mixAssets('assets/js/plugins.bundle.js') }}"></script>
    <script src="{{ mixAssets('assets/js/scripts.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#email, #password').click(function() {
                $('.alert-danger').slideUp();
            });

            $('form').submit(function() {
                $('#btn-login').html('Carregando...');
            });

        });
    </script>
</body>
</html>