<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="assets/favicon.ico" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link rel="stylesheet" href="{{ mixAssets('assets/css/datatables.bundle.css') }}" />
	<link rel="stylesheet" href="{{ mixAssets('assets/css/style.css') }}" />
	<link rel="stylesheet" href="{{ mixAssets('assets/css/sweetalert2.css') }}" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="{{ mixAssets('assets/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{mixAssets('assets/css/lineicons.css')}}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ mixAssets('assets/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ mixAssets('assets/css/main.css') }}" />
	<link rel="stylesheet" href="{{ mixAssets('assets/css/multi-select.css') }}" />
	<link rel="stylesheet" href="{{ mixAssets('assets/css/plugins.bundle.css') }}" />
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lg-zoom.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lg-thumbnail.css">
	@yield('css')
</head>

<body>
	<div id="preloader">
		<div class="spinner"></div>
	</div>
	<aside class="sidebar-nav-wrapper">
		<div class="navbar-logo">
			<a href="{{route('Dashboard.index')}}">
				<svg xmlns="http://www.w3.org/2000/svg" fill="#e2231a" viewBox="0 0 160 33.398"><g transform="translate(0 0)" style="isolation:isolate"><path d="M3.338,3.342H30.063V30.066H3.338ZM0,0,0,33.4H33.394V.007L33.4,0Z" transform="translate(0 -0.001)"></path><path d="M0,0H21.715V3.341H0Z" transform="translate(5.843 24.218)"></path><path d="M0,0H21.721V3.341H0Z" transform="translate(5.842 5.843)"></path><path d="M0,0H4.174V10.024H0Z" transform="translate(5.842 11.689)"></path><path d="M0,0H4.167V10.024H0Z" transform="translate(14.617 11.689)"></path><path d="M0,0H4.178V10.024H0Z" transform="translate(23.38 11.689)"></path><path class="ocultar-menor" d="M176.964,38.516H170.27V25.129l-4.485,13.387h-6.7l-4.451-13.387V38.516h-6.695V11.74h8.937l5.557,16.738,5.589-16.738h8.938Z" transform="translate(-106.191 -8.427)"></path><path class="ocultar-menor" d="M344.954,38.516H331.143V32.493h13.745a2.217,2.217,0,1,0,0-4.433c-.406.009-5.579,0-5.579,0a8.16,8.16,0,1,1,0-16.32H353.2l-1.978,6.04H339.293a2.1,2.1,0,0,0-2.123,2.215,2.152,2.152,0,0,0,2.123,2.037h5.661a8.242,8.242,0,1,1,0,16.484" transform="translate(-237.687 -8.427)"></path><path class="ocultar-menor" d="M420.874,27.375h2.214L421.25,21.78l-5.588,16.735h-6.695L417.9,11.74H424.6l8.9,26.776h-6.692L425.2,33.663h-6.407Z" transform="translate(-293.548 -8.427)"></path><path class="ocultar-menor" d="M519.694,38.516H501.121V11.74h6.69V32.224h11.883Z" transform="translate(-359.694 -8.427)"></path><path class="ocultar-menor" d="M264.873,28.059h6.494V22.037h-6.494V17.762h11.173l1.979-6.022h-19.85V38.516h18.48V32.494H264.873Z" transform="translate(-185.312 -8.427)"></path></g></svg>
			</a>
		</div>
		<nav class="sidebar-nav">
			<ul>
				<li class="nav-item {{ Route::is('Dashboard.index') ? 'active' : '' }}">
					<a href="{{route('Dashboard.index')}}">
						<span class="icon">
							<svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
							</svg>
						</span>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li class="nav-item nav-item-has-children">
					<a
						href="#0"
						class="{{ Route::is('Pedidos.index') || Route::is('Pedidos.criar') ? '' : 'collapsed' }}"
						data-bs-toggle="collapse"
						aria-expanded="{{ Route::is('Pedidos.index') || Route::is('Pedidos.criar') ? 'true' : 'false' }}"
						aria-label="Toggle navigation">
						<span class="icon">
							<svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
							</svg>
						</span>
						<span class="text">Pedidos</span>
					</a>

					<ul class="dropdown-nav collapse {{ Route::is('Pedidos.index') || Route::is('Pedidos.criar') ? 'show' : '' }}">
						<li>
							<a href="{{ route('Pedidos.criar') }}" class="{{ Route::is('Pedidos.criar') ? 'active' : '' }}">Criar</a>
						</li>
						<li>
							<a href="{{ route('Pedidos.index') }}" class="{{ Route::is('Pedidos.index') ? 'active' : '' }}">Visualizar todos</a>
						</li>
					</ul>
				</li>
				<li class="nav-item nav-item-has-children">
					<a
						href="#0"
						class="{{ Route::is('PedidosAmostras.index') || Route::is('PedidosAmostras.criar-index') ? '' : 'collapsed' }}"
						data-bs-toggle="collapse"
						aria-expanded="{{ Route::is('PedidosAmostras.index') || Route::is('PedidosAmostras.criar-index') ? 'true' : 'false' }}"
						aria-label="Toggle navigation">
						<span class="icon">
							<svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
							</svg>
						</span>
						<span class="text">Especs. de amostras</span>
					</a>
					<ul class="dropdown-nav collapse {{ Route::is('PedidosAmostras.index') || Route::is('PedidosAmostras.criar-index') ? 'show' : '' }}">
						<li>
							<a href="{{ route('PedidosAmostras.criar-index') }}" class="{{ Route::is('PedidosAmostras.criar-index') ? 'active' : '' }}">Criar</a>
						</li>
						<li>
							<a href="{{ route('PedidosAmostras.index') }}" class="{{ Route::is('PedidosAmostras.index') ? 'active' : '' }}">Visualizar todos</a>
						</li>
					</ul>
				</li>
				<li class="nav-item nav-item-has-children">
					<a
						href="#0"
						class="{{ Route::is('Especificacoes.index') || Route::is('Especificacoes.criar_etapa1') ? '' : 'collapsed' }}"
						data-bs-toggle="collapse"
						aria-expanded="{{ Route::is('Especificacoes.index') || Route::is('Especificacoes.criar_etapa1e2') ? 'true' : 'false' }}"
						aria-label="Toggle navigation">
						<span class="icon">
							<svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 0 1-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 1 1-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 0 1 6.336-4.486l-3.276 3.276a3.004 3.004 0 0 0 2.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852Z" />
								<path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008Z" />
							</svg>
						</span>
						<span class="text">Especs. de máquinas</span>
					</a>
					<ul class="dropdown-nav collapse {{ Route::is('Especificacoes.index') || Route::is('Especificacoes.criar_etapa1') ? 'show' : '' }}">
						<li>
							<a href="{{ route('Especificacoes.criar_etapa1') }}" class="{{ Route::is('Especificacoes.criar_etapa1') ? 'active' : '' }}">Criar</a>
						</li>
						<li>
							<a href="{{ route('Especificacoes.index') }}" class="{{ Route::is('Especificacoes.index') ? 'active' : '' }}">Visualizar todos</a>
						</li>
					</ul>
				</li>
				<li class="nav-item nav-item-has-children">
					<a
						href="#0"
						class="{{ Route::is('PedidosProdutos.index') || Route::is('PedidosProdutos.criar-index') ? '' : 'collapsed' }}"
						data-bs-toggle="collapse"
						aria-expanded="{{ Route::is('PedidosProdutos.index') || Route::is('PedidosProdutos.criar-index') ? 'true' : 'false' }}"
						aria-label="Toggle navigation">
						<span class="icon">
							<svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v8.25A2.25 2.25 0 0 0 6 16.5h2.25m8.25-8.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-7.5A2.25 2.25 0 0 1 8.25 18v-1.5m8.25-8.25h-6a2.25 2.25 0 0 0-2.25 2.25v6" />
							</svg>
						</span>
						<span class="text">Especs. de produtos</span>
					</a>
					<ul class="dropdown-nav collapse {{ Route::is('PedidosProdutos.index') || Route::is('PedidosProdutos.criar-index') ? 'show' : '' }}">
						<li>
							<a href="{{ route('PedidosProdutos.criar-index') }}" class="{{ Route::is('PedidosProdutos.criar-index') ? 'active' : '' }}">Criar</a>
						</li>
						<li>
							<a href="{{ route('PedidosProdutos.index') }}" class="{{ Route::is('PedidosProdutos.index') ? 'active' : '' }}">Visualizar todos</a>
						</li>
					</ul>
				</li>
				@if($loggedUser->tipo == 'adm')
				<span class="divider">
					<hr />
				</span>
				<li class="nav-item nav-item-has-children">
					<a
						class="{{ Route::is('Amostras.index') || Route::is('Amostras.criar') ? '' : 'collapsed' }}"
						data-bs-toggle="collapse"
						aria-expanded="{{ Route::is('Amostras.index') || Route::is('Amostras.criar') ? 'true' : 'false' }}"
						aria-label="Toggle navigation">
						<span class="icon">
							<svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
							</svg>
						</span>
						<span class="text">Amostras</span>
					</a>
					<ul class="dropdown-nav collapse {{ Route::is('Amostras.index') || Route::is('Amostras.criar') ? 'show' : '' }}">
						<li>
							<a href="{{ route('Amostras.criar') }}" class="{{ Route::is('Amostras.criar') ? 'active' : '' }}">Criar</a>
						</li>
						<li>
							<a href="{{ route('Amostras.index') }}" class="{{ Route::is('Amostras.index') ? 'active' : '' }}">Visualizar todos</a>
						</li>
					</ul>
				</li>
				<li class="nav-item nav-item-has-children">
					<a
						class="{{ Route::is('Caracteristicas.index') || Route::is('Caracteristicas.criar') ? '' : 'collapsed' }}"
						data-bs-toggle="collapse"
						aria-expanded="{{ Route::is('Caracteristicas.index') || Route::is('Caracteristicas.criar') ? 'true' : 'false' }}"
						aria-label="Toggle navigation">
						<span class="icon">
							<svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
							</svg>
						</span>
						<span class="text">Características</span>
					</a>
					<ul class="dropdown-nav collapse {{ Route::is('Caracteristicas.index') || Route::is('Caracteristicas.criar') ? 'show' : '' }}">
						<li>
							<a href="{{ route('Caracteristicas.criar') }}" class="{{ Route::is('Caracteristicas.criar') ? 'active' : '' }}">Criar</a>
						</li>
						<li>
							<a href="{{ route('Caracteristicas.index') }}" class="{{ Route::is('Caracteristicas.index') ? 'active' : '' }}">Visualizar todos</a>
						</li>
					</ul>
				</li>
				<li class="nav-item nav-item-has-children">
					<a
						class="{{ Route::is('Produtos.index') || Route::is('Produtos.criar') ? '' : 'collapsed' }}"
						data-bs-toggle="collapse"
						aria-expanded="{{ Route::is('Produtos.index') || Route::is('Produtos.criar') ? 'true' : 'false' }}"
						aria-label="Toggle navigation">
						<span class="icon">
							<svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
							</svg>
						</span>
						<span class="text">Produtos</span>
					</a>
					<ul class="dropdown-nav collapse {{ Route::is('Produtos.index') || Route::is('Produtos.criar') ? 'show' : '' }}">
						<li>
							<a href="{{ route('Produtos.criar') }}" class="{{ Route::is('Produtos.criar') ? 'active' : '' }}">Criar</a>
						</li>
						<li>
							<a href="{{ route('Produtos.index') }}" class="{{ Route::is('Produtos.index') ? 'active' : '' }}">Visualizar todos</a>
						</li>
					</ul>
				</li>
				@endif
				<span class="divider">
					<hr />
				</span>
				<li class="nav-item nav-item-has-children">
					<a
						class="{{ Route::is('Clientes.index') || Route::is('Clientes.criar') ? '' : 'collapsed' }}"
						data-bs-toggle="collapse"
						aria-expanded="{{ Route::is('Clientes.index') || Route::is('Clientes.criar') ? 'true' : 'false' }}"
						aria-label="Toggle navigation">
						<span class="icon">
							<svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
							</svg>
						</span>
						<span class="text">Clientes</span>
					</a>
					<ul class="dropdown-nav collapse {{ Route::is('Clientes.index') || Route::is('Clientes.criar') ? 'show' : '' }}">
						<li>
							<a href="{{ route('Clientes.criar') }}" class="{{ Route::is('Clientes.criar') ? 'active' : '' }}">Criar</a>
						</li>
						<li>
							<a href="{{ route('Clientes.index') }}" class="{{ Route::is('Clientes.index') ? 'active' : '' }}">Visualizar todos</a>
						</li>
					</ul>
				</li>
				<li class="nav-item nav-item-has-children">
					<a
						class="{{ Route::is('Equipamentos.index') || Route::is('Equipamentos.criar') ? '' : 'collapsed' }}"
						data-bs-toggle="collapse"
						aria-expanded="{{ Route::is('Equipamentos.index') || Route::is('Equipamentos.criar') ? 'true' : 'false' }}"
						aria-label="Toggle navigation">
						<span class="icon">
							<svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
							</svg>
						</span>
						<span class="text">Eq. de origem</span>
					</a>
					<ul class="dropdown-nav collapse {{ Route::is('Equipamentos.index') || Route::is('Equipamentos.criar') ? 'show' : '' }}">
						<li>
							<a href="{{ route('Equipamentos.criar') }}" class="{{ Route::is('Equipamentos.criar') ? 'active' : '' }}">Criar</a>
						</li>
						<li>
							<a href="{{ route('Equipamentos.index') }}" class="{{ Route::is('Equipamentos.index') ? 'active' : '' }}">Visualizar todos</a>
						</li>
					</ul>
				</li>
				<li class="nav-item nav-item-has-children">
					<a
						class="{{ Route::is('Maquinas.index') || Route::is('Maquinas.criar') ? '' : 'collapsed' }}"
						data-bs-toggle="collapse"
						aria-expanded="{{ Route::is('Maquinas.index') || Route::is('Maquinas.criar') ? 'true' : 'false' }}"
						aria-label="Toggle navigation">
						<span class="icon">
							<svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
							</svg>
						</span>
						<span class="text">Máquinas</span>
					</a>
					<ul class="dropdown-nav collapse {{ Route::is('Maquinas.index') || Route::is('Maquinas.criar') ? 'show' : '' }}">
						<li>
							<a href="{{ route('Maquinas.criar') }}" class="{{ Route::is('Maquinas.criar') ? 'active' : '' }}">Criar</a>
						</li>
						<li>
							<a href="{{ route('Maquinas.index') }}" class="{{ Route::is('Maquinas.index') ? 'active' : '' }}">Visualizar todos</a>
						</li>
					</ul>
				</li>
				<li class="nav-item nav-item-has-children">
					<a
						class="{{ Route::is('Secoes.index') || Route::is('Secoes.criar') ? '' : 'collapsed' }}"
						data-bs-toggle="collapse"
						aria-expanded="{{ Route::is('Secoes.index') || Route::is('Secoes.criar') ? 'true' : 'false' }}"
						aria-label="Toggle navigation">
						<span class="icon">
							<svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
							</svg>
						</span>
						<span class="text">Seções</span>
					</a>
					<ul class="dropdown-nav collapse {{ Route::is('Secoes.index') || Route::is('Secoes.criar') ? 'show' : '' }}">
						<li>
							<a href="{{ route('Secoes.criar') }}" class="{{ Route::is('Secoes.criar') ? 'active' : '' }}">Criar</a>
						</li>
						<li>
							<a href="{{ route('Secoes.index') }}" class="{{ Route::is('Secoes.index') ? 'active' : '' }}">Visualizar todos</a>
						</li>
					</ul>
				</li>
				<span class="divider">
					<hr />
				</span>
				<li class="nav-item {{ Route::is('Usuario.perfil') ? 'active' : '' }}">
					<a
					href="{{route('Usuario.perfil')}}">
						<span class="icon">
							<i class="lni lni-user"></i>
						</span>
						<span class="text">Meu perfil</span>
					</a>
				</li>
				<li class="nav-item">
					<a 
					href="{{route('Usuario.index')}}">
						<span class="icon">
							<i class="lni lni-exit"></i>
						</span>
						<span class="text">Sair</span>
					</a>
				</li>
			</ul>
		</nav>
	</aside>
	<div class="overlay"></div>
	<main class="main-wrapper">
		<header class="header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-5 col-md-5 col-6">
						<div class="header-left d-flex align-items-center">
							<div class="menu-toggle-btn mr-15">
								<button id="menu-toggle" class="main-btn primary-btn btn-hover">
									<i class="lni lni-chevron-left me-2"></i> Menu
								</button>
							</div>
							<div class="header-search d-none d-md-flex">
								<form action="{{ route('Especificacoes.index') }}" method="GET" class="d-flex">
									<input class="bg-transparent" type="text" name="serie" placeholder="Serie..." value="{{ request('serie') }}">
									<button type="submit"><i class="lni lni-search-alt"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-7 col-md-7 col-6">
						<div class="header-right">
							<div class="profile-box ml-15 d-md-flex">
								<button class="dropdown-toggle bg-transparent border-0 dropdown-modal" id="modalOpenUser">
									<div class="profile-info">
										<div class="info">
											<div class="image">
												<img src="{{ mixAssets('assets/img/users/' . $loggedUser->avatar) }}" alt="user" />
											</div>
											<div>
												<h6 class="fw-500">{{ $loggedUser->nome }}</h6>
												<p class="mb-0">
													@if($loggedUser->tipo == 'vendas')
														Vendas
													@elseif($loggedUser->tipo == 'colaborador_loja')
														Colaborador
													@elseif($loggedUser->tipo == 'adm')
														Admin
													@endif
												</p>
											</div>
										</div>
									</div>
								</button>
							</div>
							<!-- <div class="profile-box ml-10">
								<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile" data-bs-toggle="dropdown" id="profile">
									<li>
										<div class="author-info flex items-center !p-1">
											<div class="image">
												<img src="{{ mixAssets('assets/img/users/' . $loggedUser->avatar) }}" alt="user" />
											</div>
											<div class="content">
												<h4 class="text-sm">{{ $loggedUser->nome }}</h4>
											</div>
										</div>
									</li>
									<li class="divider"></li>
									<li>
										<a class="link-modal" href="{{route('Usuario.perfil')}}">
											<i class="lni lni-user"></i> Meu perfil
										</a>
									</li>
									<li>
										<a class="link-modal" href="{{route('Usuario.index')}}">
											<i class="lni lni-alarm"></i> Usuários
										</a>
									</li>
									<li class="divider"></li>
									<li>
										<a class="link-modal" href="{{route('logout')}}"> <i class="lni lni-exit"></i> Sair </a>
									</li>
								</ul>
							</div> -->
							<div class="hidden modal-options-menu" data-modal="modalOpenUser">
								<ul class="modal-options" style="margin-top: 50px; margin-right: 40px;">
									<li class="dropdown-item link-modal" style="cursor: pointer;">
										<div class="d-flex align-items-center gap-2">
											<div class="image">
												<img class="rounded-circle" style="width: 32px; height: 32px;" src="{{ mixAssets('assets/img/users/' . $loggedUser->avatar) }}" alt="user" />
											</div>
											<div class="content">
												<h4 class="text-sm">{{ $loggedUser->nome }}</h4>
											</div>
										</div>
									</li>
									<li class="dropdown-item link-modal mt-3" style="cursor: pointer;">
										<a class="link-modal" 
											href="{{ route('Usuario.perfil') }}">
											<i class="lni lni-user"></i> Meu perfil
										</a>
									</li>
									@if($loggedUser->tipo == 'adm')
									<li class="dropdown-item link-modal" style="cursor: pointer;">
										<a class="link-modal" 
											href="{{route('Usuario.index')}}">
											<i class="lni lni-users"></i> Usuários
										</a>
									</li>
									@endif
									<li class="dropdown-item link-modal" style="cursor: pointer;">
										<a class="link-modal" 
											href="{{route('logout')}}">
											<i class="lni lni-exit"></i> Sair
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		@yield('content')
		<footer class="footer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 order-last order-md-first">
						<div class="copyright text-center text-md-start">
							<p class="text-sm">
								Projetado e desenvolvido por
								<a href="#" rel="nofollow">
									CITEC
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</main>
	
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
	<script src="{{ mixAssets('assets/js/plugins.bundle.js') }}"></script>
	<script src="{{ mixAssets('assets/js/scripts.bundle.js') }}"></script>
	<script src="{{ mixAssets('assets/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ mixAssets('assets/js/sign-in/general.js') }}"></script>
	<script src="{{ mixAssets('assets/js/datatables.bundle.js') }}"></script>
	<script src="{{ mixAssets('assets/js/list.js') }}"></script>
	<script src="{{ mixAssets('assets/js/project.js') }}"></script>
	<script src="{{ mixAssets('assets/js/sweetalert2.min.js') }}"></script>
	<script src="{{ mixAssets('assets/js/tinymce/tinymce.min.js') }}"></script>
	<script src="{{ mixAssets('/assets/js/jquery.multi-select.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.4.0/jquery.quicksearch.min.js"></script>

	<script src="{{ mixAssets('assets/js/moment.min.js') }}"></script>
	<script src="{{ mixAssets('assets/js/jvectormap.min.js') }}"></script>
	<script src="{{ mixAssets('assets/js/world-merc.js') }}"></script>
	<script src="{{ mixAssets('assets/js/polyfill.js') }}"></script>
	<script src="{{ mixAssets('assets/js/main.js') }}"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.umd.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/zoom/lg-zoom.umd.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/thumbnail/lg-thumbnail.umd.js"></script>
	
	<script src="{{ mixAssets('assets/js/functions.js') }}"></script>

	@yield('plugins')
	<script src="{{ mixAssets('assets/js/form.js') }}"></script>
	<script src="{{ mixAssets('assets/js/new-target.js') }}"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			@if(session('success'))
				Swal.fire({
					icon: 'success',
					title: 'Sucesso',
					text: '{{ session('success') }}'
				});
				@endif

				@if(session('error'))
				Swal.fire({
					icon: 'error',
					title: 'Erro',
					text: '{{ session('error') }}'
				});
			@endif
		});

		$(document).ready(function () {
			$('.nav-item-has-children > a').on('click', function (e) {
				e.preventDefault();

				const $this = $(this);
				const $submenu = $this.next('.dropdown-nav');

				$('.dropdown-nav').not($submenu).slideUp(200).parent().removeClass('open');
				$('.nav-item-has-children > a').not($this).addClass('collapsed')
					.attr('aria-expanded', 'false');

				if ($submenu.is(':visible')) {
					$submenu.slideUp(200);
					$this.addClass('collapsed')
						.attr('aria-expanded', 'false')
						.parent().removeClass('open');
				} else {
					$submenu.slideDown(200);
					$this.removeClass('collapsed')
						.attr('aria-expanded', 'true')
						.parent().addClass('open');
				}
			});
		});
		
	</script>
</body>

</html>