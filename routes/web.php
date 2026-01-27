<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EspecificacoesController;
use App\Http\Controllers\CaracteristicasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaquinasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\SecoesController;
use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\AmostrasController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\EspecificacoesProdutosController;
use App\Http\Controllers\EspecificacoesAmostrasController;
use App\Http\Controllers\PedidosAmostrasController;
use App\Http\Controllers\PropostasController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\PedidosProdutosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('segunda-etapa', [TwoFactorController::class, 'showForm'])->name('segunda-etapa.form');
    Route::post('segunda-etapa', [TwoFactorController::class, 'verifyCode'])->name('segunda-etapa.verify');
});

// Route::middleware(['auth', '2fa'])->group(function () {
    //notificacoes
    // Route::get('/notificacoes', [NotificacoesController::class, 'index'])->name('Notifications');
    // Route::post('/notificacao/action', [NotificacoesController::class, 'action'])->name('Notification.action');
    // Route::post('/{marca}/{slug}/notificacao/{id}', [NotificacoesController::class, 'actionSingle'])->name('Notification.action.single');
    // Route::get('/notificacao/ler-todas', [NotificacoesController::class, 'readAll'])->name('Notification.read.all');
    
// });

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_action'])->name('login_action');
Route::get('/recuperar/senha', [UsuariosController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/recuperar/senha', [UsuariosController::class, 'forgotPasswordAction'])->name('forgotPassword.action');
Route::get('/recuperar/senha/{token}', [UsuariosController::class, 'showResetForm'])->name('ShowResetForm');
Route::post('/resetar/senha', [UsuariosController::class, 'resetpassword'])->name('Resetpassword');

Route::middleware(['auth', '2fa'])->group(function () {
    Route::get('/perfil', [UsuariosController::class, 'perfil'])->name('Usuario.perfil');
    Route::post('/perfil', [UsuariosController::class, 'perfil_action'])->name('Usuario.perfil_action');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/upload-imagem', [DashboardController::class, 'uploadImage'])->name('Upload.imagem');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard.index');
    Route::post('/especificacoes/revisao/', [EspecificacoesController::class, 'revisao'])->name('Especificacoes.revisao');
    Route::get('/especificacao/{id}', [EspecificacoesController::class, 'especificacao'])->name('Especificacoes.especificacao');

    Route::prefix('/especificacoes')->group(function () {
        Route::get('/', [EspecificacoesController::class, 'index'])->name('Especificacoes.index');
        Route::get('/criar/primeira-etapa', [EspecificacoesController::class, 'criar_etapa1'])->name('Especificacoes.criar_etapa1');
        Route::get('/criar/segunda-etapa/{slug}', [EspecificacoesController::class, 'criar_etapa2'])->name('Especificacoes.criar_etapa2');
        Route::post('/criar/{id}', [EspecificacoesController::class, 'criar_action'])->name('Especificacoes.criar_action');
        Route::get('/editar/{id}', [EspecificacoesController::class, 'editar'])->name('Especificacoes.editar');
        Route::post('/editar/{id}', [EspecificacoesController::class, 'editar_action'])->name('Especificacoes.editar_action');
        Route::post('/excluir/{id}', [EspecificacoesController::class, 'excluir'])->name('Especificacoes.excluir');
        Route::get('/exportar-word/{id}', [EspecificacoesController::class, 'exportarWord'])->name('Especificacoes.word');
        
        Route::delete('/caracteristica/excluir/{id}', [EspecificacoesController::class, 'excluir_caracteristica'])->name('Especificacoes.excluir_caracteristica');

        Route::get('/{especificacaoId}/amostra/adicionar/{id}', [EspecificacoesAmostrasController::class, 'criar_amostra'])->name('Especificacoes.criar_amostra');
        Route::post('/{especificacaoId}/amostra/adicionar/{id}', [EspecificacoesAmostrasController::class, 'criar_amostra_action'])->name('Especificacoes.criar_amostra_action');
        Route::get('/amostra/editar/{id}', [EspecificacoesAmostrasController::class, 'editar_amostra'])->name('Especificacoes.editar_amostra');
        Route::post('/amostra/editar/{id}', [EspecificacoesAmostrasController::class, 'editar_amostra_action'])->name('Especificacoes.editar_amostra_action');
        Route::post('/amostra/excluir/{id}', [EspecificacoesAmostrasController::class, 'excluir_amostra'])->name('Especificacoes.excluir_amostra');

        Route::get('/{especificacaoId}/produto/adicionar/{id}', [EspecificacoesProdutosController::class, 'criar_produto'])->name('Especificacoes.criar_produto');
        Route::post('/{especificacaoId}/produto/adicionar/{id}', [EspecificacoesProdutosController::class, 'criar_produto_action'])->name('Especificacoes.criar_produto_action');
        Route::get('/produto/editar/{id}', [EspecificacoesProdutosController::class, 'editar_produto'])->name('Especificacoes.editar_produto');
        Route::post('/produto/editar/{id}', [EspecificacoesProdutosController::class, 'editar_produto_action'])->name('Especificacoes.editar_produto_action');
        Route::post('/produto/excluir/{id}', [EspecificacoesProdutosController::class, 'excluir_produto'])->name('Especificacoes.excluir_produto');
        Route::post('/amostra/pedido', [EspecificacoesController::class, 'amostra_pedido'])->name('Especificacoes.amostra_pedido');
        Route::post('/produto/pedido', [EspecificacoesController::class, 'produto_pedido'])->name('Especificacoes.produto_pedido');

        Route::get('/comparar/{id}', [EspecificacoesController::class, 'comparacao'])->name('Especificacoes.comparacao');
        Route::get('/amostra/pedido/{id}', [EspecificacoesController::class, 'get_amostra_pedido'])->name('Especificacoes.amostraPedido');
        Route::get('/produto/pedido/{id}', [EspecificacoesController::class, 'get_produto_pedido'])->name('Especificacoes.produtoPedido');
        Route::get('/revisao/{id}', [EspecificacoesController::class, 'get_revisao'])->name('Especificacoes.revisao-modal');

    });

    Route::prefix('/maquinas')->group(function () {
        Route::get('/', [MaquinasController::class, 'index'])->name('Maquinas.index');
        Route::get('/criar', [MaquinasController::class, 'criar'])->name('Maquinas.criar');
        Route::post('/criar', [MaquinasController::class, 'criar_action'])->name('Maquinas.criar_action');
        Route::get('/editar/{id}', [MaquinasController::class, 'editar'])->name('Maquinas.editar');
        Route::post('/editar/{id}', [MaquinasController::class, 'editar_action'])->name('Maquinas.editar_action');
        Route::post('/excluir/{id}', [MaquinasController::class, 'excluir'])->name('Maquinas.excluir');
    });

    Route::prefix('/equipamentos')->group(function () {
        Route::get('/', [EquipamentosController::class, 'index'])->name('Equipamentos.index');
        Route::get('/criar', [EquipamentosController::class, 'criar'])->name('Equipamentos.criar');
        Route::post('/criar', [EquipamentosController::class, 'criar_action'])->name('Equipamentos.criar_action');
        Route::get('/editar/{id}', [EquipamentosController::class, 'editar'])->name('Equipamentos.editar');
        Route::post('/editar/{id}', [EquipamentosController::class, 'editar_action'])->name('Equipamentos.editar_action');
        Route::post('/excluir/{id}', [EquipamentosController::class, 'excluir'])->name('Equipamentos.excluir');
    });

    Route::middleware(['adm'])->group(function () {
        Route::prefix('/caracteristicas')->group(function () {
            Route::get('/', [CaracteristicasController::class, 'index'])->name('Caracteristicas.index');
            Route::get('/criar', [CaracteristicasController::class, 'criar'])->name('Caracteristicas.criar');
            Route::post('/criar', [CaracteristicasController::class, 'criar_action'])->name('Caracteristicas.criar_action');
            Route::get('/editar/{id}', [CaracteristicasController::class, 'editar'])->name('Caracteristicas.editar');
            Route::post('/editar/{id}', [CaracteristicasController::class, 'editar_action'])->name('Caracteristicas.editar_action');
            Route::post('/excluir/{id}', [CaracteristicasController::class, 'excluir'])->name('Caracteristicas.excluir');
            Route::get('/copiar/{id}', [CaracteristicasController::class, 'copiar'])->name('Caracteristicas.copiar');
        });

        Route::prefix('/amostras')->group(function () {
            Route::get('/', [AmostrasController::class, 'index'])->name('Amostras.index');
            Route::get('/criar', [AmostrasController::class, 'criar'])->name('Amostras.criar');
            Route::get('/criar/atributo/{id}', [AmostrasController::class, 'criar_atributo'])->name('Amostras.criar_atributo');
            Route::post('/criar', [AmostrasController::class, 'criar_action'])->name('Amostras.criar_action');
            Route::post('/criar/atributo/{id}', [AmostrasController::class, 'criar_atributo_action'])->name('Amostras.criar_atributo_action');
            Route::get('/editar/{id}', [AmostrasController::class, 'editar'])->name('Amostras.editar');
            Route::get('/editar/amostra/atributo/{id}', [AmostrasController::class, 'editar_atributo'])->name('Amostras.editar_atributo');
            Route::post('/editar/{id}', [AmostrasController::class, 'editar_action'])->name('Amostras.editar_action');
            Route::post('/editar/amostra/atributo/{id}', [AmostrasController::class, 'editar_atributo_action'])->name('Amostras.editar_atributo_action');
            Route::post('/excluir/{id}', [AmostrasController::class, 'excluir'])->name('Amostras.excluir');
            Route::post('/atributo/excluir/{id}', [AmostrasController::class, 'excluir_amostra_atributo'])->name('Amostras.excluir_amostra_atributo');
            Route::post('/imagem/excluir/{id}', [AmostrasController::class, 'excluir_imagem'])->name('Amostras.excluir_imagem');
            Route::post('/upload-atributo-imagens', [AmostrasController::class, 'upload_atributo_imagens'])->name('Amostras.atributo_imagem');
            Route::post('/excluir-atributo-imagem/{id}', [AmostrasController::class, 'excluir_atributo_imagens'])->name('Amostras.atributo_excluir_imagem');
            Route::post('/copiar', [AmostrasController::class, 'copiar_action'])->name('Amostras.copiar_amostra');
        });

        Route::prefix('/produtos')->group(function () {
            Route::get('/', [ProdutosController::class, 'index'])->name('Produtos.index');
            Route::get('/criar', [ProdutosController::class, 'criar'])->name('Produtos.criar');
            Route::get('/criar/atributo/{id}', [ProdutosController::class, 'criar_atributo'])->name('Produtos.criar_atributo');
            Route::post('/criar', [ProdutosController::class, 'criar_action'])->name('Produtos.criar_action');
            Route::post('/criar/atributo/{id}', [ProdutosController::class, 'criar_atributo_action'])->name('Produtos.criar_atributo_action');
            Route::get('/editar/{id}', [ProdutosController::class, 'editar'])->name('Produtos.editar');
            Route::get('/editar/produto/atributo/{id}', [ProdutosController::class, 'editar_atributo'])->name('Produtos.editar_atributo');
            Route::post('/editar/{id}', [ProdutosController::class, 'editar_action'])->name('Produtos.editar_action');
            Route::post('/editar/produto/atributo/{id}', [ProdutosController::class, 'editar_atributo_action'])->name('Produtos.editar_atributo_action');
            Route::post('/excluir/{id}', [ProdutosController::class, 'excluir'])->name('Produtos.excluir');
            Route::post('/atributo/excluir/{id}', [ProdutosController::class, 'excluir_produto_atributo'])->name('Produtos.excluir_produto_atributo');
            Route::post('/imagem/excluir/{id}', [ProdutosController::class, 'excluir_imagem'])->name('Produtos.excluir_imagem');
            Route::post('/upload-atributo-imagens', [ProdutosController::class, 'upload_atributo_imagens'])->name('Produtos.atributo_imagem');
            Route::post('/excluir-atributo-imagem/{id}', [ProdutosController::class, 'excluir_atributo_imagens'])->name('Produtos.atributo_excluir_imagem');
        });

        Route::get('/usuarios', [UsuariosController::class, 'index'])->name('Usuario.index');

    });

    Route::prefix('/especificacoes-amostras')->group(function () {
        Route::get('/criar', [PedidosAmostrasController::class, 'criar_index'])->name('PedidosAmostras.criar-index');
        Route::get('/criar/{id}', [PedidosAmostrasController::class, 'criar'])->name('PedidosAmostras.criar');
        Route::post('/criar/{id}', [PedidosAmostrasController::class, 'criar_action'])->name('PedidosAmostras.criar_action');
        Route::get('/editar/{id}', [PedidosAmostrasController::class, 'editar'])->name('PedidosAmostras.editar');
        Route::post('/editar/{id}', [PedidosAmostrasController::class, 'editar_action'])->name('PedidosAmostras.editar_action');
        Route::get('/copiar/{id}', [PedidosAmostrasController::class, 'copiar'])->name('PedidosAmostras.copiar');
        Route::get('/', [PedidosAmostrasController::class, 'index'])->name('PedidosAmostras.index');
        Route::post('/upload-atributo-imagens', [PedidosAmostrasController::class, 'upload_atributo_imagens_pedido'])->name('PedidosAmostras.atributo_imagem');
        Route::post('/excluir-atributo-imagem/{id}', [PedidosAmostrasController::class, 'excluir_atributo_imagens_pedido'])->name('PedidosAmostras.atributo_excluir_imagem');
        Route::post('/imagem/excluir/{id}', [PedidosAmostrasController::class, 'excluir_imagem'])->name('PedidosAmostras.excluir_imagem');
        Route::post('/excluir/{id}', [PedidosAmostrasController::class, 'excluir'])->name('PedidosAmostras.excluir');
    });

    Route::prefix('/especificacoes-produtos')->group(function () {
        Route::get('/criar', [PedidosProdutosController::class, 'criar_index'])->name('PedidosProdutos.criar-index');
        Route::get('/criar/{id}', [PedidosProdutosController::class, 'criar'])->name('PedidosProdutos.criar');
        Route::post('/criar/{id}', [PedidosProdutosController::class, 'criar_action'])->name('PedidosProdutos.criar_action');
        Route::get('/editar/{id}', [PedidosProdutosController::class, 'editar'])->name('PedidosProdutos.editar');
        Route::post('/editar/{id}', [PedidosProdutosController::class, 'editar_action'])->name('PedidosProdutos.editar_action');
        Route::get('/copiar/{id}', [PedidosProdutosController::class, 'copiar'])->name('PedidosProdutos.copiar');
        Route::get('/', [PedidosProdutosController::class, 'index'])->name('PedidosProdutos.index');
        Route::post('/upload-atributo-imagens', [PedidosProdutosController::class, 'upload_atributo_imagens_pedido'])->name('PedidosProdutos.atributo_imagem');
        Route::post('/excluir-atributo-imagem/{id}', [PedidosProdutosController::class, 'excluir_atributo_imagens_pedido'])->name('PedidosProdutos.atributo_excluir_imagem');
        Route::post('/imagem/excluir/{id}', [PedidosProdutosController::class, 'excluir_imagem'])->name('PedidosProdutos.excluir_imagem');
        Route::post('/excluir/{id}', [PedidosProdutosController::class, 'excluir'])->name('PedidosProdutos.excluir');
    });

    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => [
                'localeSessionRedirect',
                'localizationRedirect',
                'localeViewPath'
            ]
        ],
        function () {
            Route::prefix('/secoes')->group(function () {
                Route::get('/', [SecoesController::class, 'index'])->name('Secoes.index');
                Route::get('/criar', [SecoesController::class, 'criar'])->name('Secoes.criar');
                Route::post('/criar', [SecoesController::class, 'criar_action'])->name('Secoes.criar_action');
                Route::get('/editar/{id}', [SecoesController::class, 'editar'])->name('Secoes.editar');
                Route::post('/editar/{id}', [SecoesController::class, 'editar_action'])->name('Secoes.editar_action');
                Route::post('/excluir/{id}', [SecoesController::class, 'excluir'])->name('Secoes.excluir');
                Route::post('/ordem', [SecoesController::class, 'ordenar'])->name('Secoes.ordenar');
            });
        }
    );

    Route::prefix('/pedidos')->group(function () {
        Route::get('/', [PedidosController::class, 'index'])->name('Pedidos.index');
        Route::get('/criar', [PedidosController::class, 'criar'])->name('Pedidos.criar');
        Route::post('/criar', [PedidosController::class, 'criar_action'])->name('Pedidos.criar_action');
        Route::get('/editar/{id}', [PedidosController::class, 'editar'])->name('Pedidos.editar');
        Route::post('/editar/{id}', [PedidosController::class, 'editar_action'])->name('Pedidos.editar_action');
        Route::post('/excluir/{id}', [PedidosController::class, 'excluir'])->name('Pedidos.excluir');
    });

    Route::prefix('/propostas')->group(function () {
        Route::get('/', [PropostasController::class, 'index'])->name('Propostas.index');
        Route::get('/criar/{id}', [PropostasController::class, 'criar'])->name('Propostas.criar');
        Route::post('/criar', [PropostasController::class, 'criar_action'])->name('Propostas.criar_action');
        Route::get('/editar/{id}', [PropostasController::class, 'editar'])->name('Propostas.editar');
        Route::post('/editar/{id}', [PropostasController::class, 'editar_action'])->name('Propostas.editar_action');
        Route::post('/excluir/{id}', [PropostasController::class, 'excluir'])->name('Propostas.excluir');
        Route::post('/ordem', [PropostasController::class, 'ordenar'])->name('Propostas.ordenar');
    });

    Route::prefix('/clientes')->group(function () {
        Route::get('/', [ClientesController::class, 'index'])->name('Clientes.index');
        Route::get('/editar/{id}', [ClientesController::class, 'editar'])->name('Clientes.editar');
        Route::post('/editar/{id}', [ClientesController::class, 'editar_action'])->name('Clientes.editar_action');
        Route::get('/criar', [ClientesController::class, 'criar'])->name('Clientes.criar');
        Route::post('/criar', [ClientesController::class, 'criar_action'])->name('Clientes.criar_action');
        // Route::post('/enviar-mensagem/{id}', [WhatsappController::class, 'sendMessage'])->name('Clientes.mensagem');
        // Route::post('/enviar-mensagens', [WhatsappController::class, 'sendMultipeMessage'])->name('Clientes.mensagens');
        Route::post('/excluir/{id}', [ClientesController::class, 'excluir'])->name('Clientes.excluir');
    });


    Route::prefix('/usuario')->group(function() {
        Route::middleware(['adm'])->group(function () {
            Route::get('/criar', [UsuariosController::class, 'criar'])->name('Usuario.criar');
            Route::post('/criar', [UsuariosController::class, 'criar_action'])->name('Usuario.criar_action');
            Route::post('/excluir/{id}', [UsuariosController::class, 'excluir'])->name('Usuario.excluir');
        });
        Route::get('/editar/{id}', [UsuariosController::class, 'editar'])->name('Usuario.editar');
        Route::post('/editar/{id}', [UsuariosController::class, 'editar_action'])->name('Usuario.editar_action');
    });
});
