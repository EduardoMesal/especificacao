<div id="mySidenav" class="sidenav">
    <div class="d-flex justify-content-between align-items-center initialSide">
        <a href="{{$url}}" class="btn btn-danger">
            <i class="bi bi-filter"></i> Limpar filtro
        </a>
        <div class="closeSide">
            <i class="bi bi-x"></i>
        </div>
    </div>
    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
        <form class="formGet" method="GET">
            <div class="row g-3 w-100">
                @if(isset($nome))
                <div class="col-12 col-lg-12 input-style-1 mb-0">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Nome</span>
                    </label>
                    <input type="text" value="{{ $nome }}" name="nome" data-kt-ecommerce-product-filter="search" class="bg-transparent" placeholder="Pesquisar pelo nome" />
                </div>
                @endif
                @if(isset($telefone))
                <div class="col-12 col-lg-12 input-style-1 mb-0">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Telefone</span>
                    </label>
                    <input type="text" value="{{ $telefone }}" name="telefone" data-kt-ecommerce-product-filter="search" class="bg-transparent form_control--mask-phone" placeholder="Pesquisar por número" />
                </div>
                @endif
                @if(isset($codigo_focco))
                <div class="col-12 col-lg-12 input-style-1 mb-0">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Código Focco</span>
                    </label>
                    <input type="text" value="{{ $codigo_focco }}" name="codigo_focco" data-kt-ecommerce-product-filter="search" class="bg-transparent" placeholder="Pesquisar pelo código" />
                </div>
                @endif
                @if(isset($serie))
                <div class="col-12 col-lg-12 input-style-1 mb-0">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Serie</span>
                    </label>
                    <input type="text" value="{{ $serie }}" name="serie" data-kt-ecommerce-product-filter="search" class="bg-transparent" placeholder="Pesquisar pela serie" />
                </div>
                @endif
                @if(isset($cliente_nome))
                <div class="col-12 col-lg-12 input-style-1 mb-0">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Cliente</span>
                    </label>
                    <input type="text" value="{{ $cliente_nome }}" name="cliente_nome" data-kt-ecommerce-product-filter="search" class="bg-transparent" placeholder="Pesquisar pelo nome do cliente" />
                </div>
                @endif
                @if(isset($pedido))
                <div class="col-12 col-lg-12 input-style-1 mb-0">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Pedido</span>
                    </label>
                    <input type="text" value="{{ $pedido }}" name="pedido" data-kt-ecommerce-product-filter="search" class="bg-transparent" placeholder="Pesquisar pelo pedido" />
                </div>
                @endif
                @if($maquinas)
                <div class="col-12 col-lg-12 input-style-1 mb-0">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Máquina</span>
                    </label>
                    <select class="form-select form-select-solid" name="maquina_id" data-control="select2" data-placeholder="Máquina">
                        <option></option>
                        @foreach($maquinas as $item)
                        <option @if($maquina_id==$item['id']) selected @endif value="{{ $item['id'] }}">
                            {!! $item['nome'] !!}
                        </option>
                        @endforeach
                    </select>
                </div>
                @endif
                @if(isset($status))
                <div class="col-12 col-lg-12 input-style-1 mb-0">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Status</span>
                    </label>
                    <select class="form-select form-select-solid" name="status" data-control="select2" data-placeholder="Status">
                        <option></option>
                        <option {{$status == 'Em andamento' ? 'selected' : ''}} value="Em andamento">Em andamento</option>
                        <option {{$status == 'Finalizada' ? 'selected' : ''}} value="Finalizada">Finalizada</option>
                    </select>
                </div>
                @endif
                @if($equipamentos)
                <div class="col-12 col-lg-12 input-style-1 mb-0">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Equipamento de origem</span>
                    </label>
                    <select class="form-select form-select-solid" name="equipamento_id" data-control="select2" data-placeholder="Equipamento de origem">
                        <option></option>
                        @foreach($equipamentos as $item)
                        <option @if($equipamento_id==$item['id']) selected @endif value="{{ $item['id'] }}">
                            {!! $item['nome'] !!}
                        </option>
                        @endforeach
                    </select>
                </div>
                @endif
                @if($clientes)
                <div class="col-12 col-lg-12 input-style-1 mb-0">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Cliente</span>
                    </label>
                    <select class="form-select form-select-solid" name="cliente_id" data-control="select2" data-placeholder="Cliente">
                        <option></option>
                        @foreach($clientes as $item)
                        <option @if($cliente_id==$item['id']) selected @endif value="{{ $item['id'] }}">
                            {!! $item['nome'] !!}
                        </option>
                        @endforeach
                    </select>
                </div>
                @endif
                @if(isset($usuario))
                <div class="col-12 col-lg-12 input-style-1 mb-0">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Criador</span>
                    </label>
                    <input type="text" value="{{ $usuario }}" name="usuario" data-kt-ecommerce-product-filter="search" class="bg-transparent" placeholder="Pesquisar pelo criador" />
                </div>
                @endif
                @if(isset($criado))
                <div class="col-12 col-lg-12 input-style-1 mb-0" style="position: relative;">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Criado em</span>
                    </label>
                    <input class="bg-transparent filter-daterangepicker" placeholder="Selecionar datas" type="text" value="{{ $criado ? $criado : '' }}" name="criado" />
                </div>
                @endif
                <div class="col-12 col-lg-12 mb-4">
                    <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    
</script>