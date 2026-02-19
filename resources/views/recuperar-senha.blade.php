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
	<link rel="stylesheet" href="{{ mixAssets('assets/css/main.css') }}" />

</head>

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="authImg d-flex flex-column flex-column-fluid">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <form class="form w-100" method="POST" action="{{route('forgotPassword.action')}}">
                        @csrf
                        <div class="text-center mb-3">
                            <div class="navbar-logo">
								<a href="{{route('login')}}">
									<svg xmlns="http://www.w3.org/2000/svg" fill="#e2231a" viewBox="0 0 160 33.398"><g transform="translate(0 0)" style="isolation:isolate"><path d="M3.338,3.342H30.063V30.066H3.338ZM0,0,0,33.4H33.394V.007L33.4,0Z" transform="translate(0 -0.001)"></path><path d="M0,0H21.715V3.341H0Z" transform="translate(5.843 24.218)"></path><path d="M0,0H21.721V3.341H0Z" transform="translate(5.842 5.843)"></path><path d="M0,0H4.174V10.024H0Z" transform="translate(5.842 11.689)"></path><path d="M0,0H4.167V10.024H0Z" transform="translate(14.617 11.689)"></path><path d="M0,0H4.178V10.024H0Z" transform="translate(23.38 11.689)"></path><path class="ocultar-menor" d="M176.964,38.516H170.27V25.129l-4.485,13.387h-6.7l-4.451-13.387V38.516h-6.695V11.74h8.937l5.557,16.738,5.589-16.738h8.938Z" transform="translate(-106.191 -8.427)"></path><path class="ocultar-menor" d="M344.954,38.516H331.143V32.493h13.745a2.217,2.217,0,1,0,0-4.433c-.406.009-5.579,0-5.579,0a8.16,8.16,0,1,1,0-16.32H353.2l-1.978,6.04H339.293a2.1,2.1,0,0,0-2.123,2.215,2.152,2.152,0,0,0,2.123,2.037h5.661a8.242,8.242,0,1,1,0,16.484" transform="translate(-237.687 -8.427)"></path><path class="ocultar-menor" d="M420.874,27.375h2.214L421.25,21.78l-5.588,16.735h-6.695L417.9,11.74H424.6l8.9,26.776h-6.692L425.2,33.663h-6.407Z" transform="translate(-293.548 -8.427)"></path><path class="ocultar-menor" d="M519.694,38.516H501.121V11.74h6.69V32.224h11.883Z" transform="translate(-359.694 -8.427)"></path><path class="ocultar-menor" d="M264.873,28.059h6.494V22.037h-6.494V17.762h11.173l1.979-6.022h-19.85V38.516h18.48V32.494H264.873Z" transform="translate(-185.312 -8.427)"></path></g></svg>
								</a>
							</div>
							<h4 class="text-primary mt-4 mb-2">Esqueceu sua senha?</h4>
                            <p class="text-medium">Digite o endereço de e-mail vinculado à sua conta e nós enviaremos um link para redefinir sua senha.</p>
                        </div>
                        <div class="fv-row mb-10 input-style-1">
                            <label class="form-label fs-6 fw-bolder text-dark">E-mail</label>
                            <input id="email" value="{{ old('email') }}" class="form-control form-control-lg form-control-solid" type="text" name="email" />
                        </div>

                        <div class="text-center">
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