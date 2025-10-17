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
            <div class="d-flex flex-center flex-column flex-column-fluid mt-5 mb-5">
                <div class="w-lg-500px bg-body rounded shadow-sm p-15 mx-auto">
                    <form class="needs-validation" style="" oninput='password_confirmation.setCustomValidity(password_confirmation.value != password.value ? "As senhas não coincidem." : "")' novalidate method="POST" action="{{route('Resetpassword')}}" enctype="multipart/form-data">
                        @csrf
                        <input id="token" value="{{$token}}" name="token" type="hidden" class="form-control">
                        <div class="text-center mb-3">
                            <a href="{{route('login')}}" class="mb-12">
                                <img alt="Logo" src="{{ mixAssets('assets/img/logo.png') }}" class="w-120px" />
                            </a>
                            <h2 class="text-dark mt-6 mb-3">Recuperar senha</h1>
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">E-mail</label>
                            <input id="email" disabled value="{{$email}}" class="form-control form-control-lg form-control-solid" type="text" name="email" />
                            <input value="{{$email}}" name="email" type="hidden" class="form-control">
                        </div>

                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Senha</label>
                            <input name="password"value="{{ old('password') }}" class="form-control form-control-lg form-control-solid" type="password" required id="inputS">
                        </div>

                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Confirmar Senha</label>
                            <input name="password_confirmation"value="{{ old('password_confirmation') }}" class="form-control form-control-lg form-control-solid" type="password" required id="inputS2">
                            <div class="invalid-feedback">
                                As senhas não coincidem
                            </div>
                        </div>

                        <div class="text-center  mb-5">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ mixAssets('assets/js/plugins.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#email, #inputS, #inputS2').click(function() {
                $('.alert-danger').slideUp();
            });
        });

        (function() {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>