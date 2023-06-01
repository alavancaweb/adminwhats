<?php

//use App\Http\Controllers\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MensController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ConectarController;

Route::get('/login', function () {
    return view('pages.user-pages.login');
})->name('login');

Route::get('/', function () {
    return view('pages.user-pages.login');
})->name('login');

Route::post('/login/auth', [LoginController::class, 'login'])->name('login.auth');

Route::group(['middleware' => 'auth'], function () {

    //Rota Logar
    Route::post('/usuarios/add', [DashboardController::class, 'adicionar'])->name('usuarios.add');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout.login');

    //Rotas Conectar
    Route::get('/conectar', [ConectarController::class, 'index'])->name('conectar.home');
    Route::get('/conectar/delete{id}', [ConectarController::class, 'deletar'])->name('conectar.delete');
    Route::post('/conectar/add', [ConectarController::class, 'adicionar'])->name('conectar.add');
    Route::post('/conectar/edit{id}', [ConectarController::class, 'editar'])->name('conectar.editar');
    Route::get('/conectar/qrcode{id}', [ConectarController::class, 'conectarQrcode'])->name('conectar.qrcode');

    //Rotas Usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index']);
    Route::get('/usuarios/delete{id}', [UsuarioController::class, 'deletar'])->name('usuario.delete');
    Route::post('/usuarios/add', [UsuarioController::class, 'adicionar'])->name('usuario.add');
    Route::post('/usuarios/edit{id}', [UsuarioController::class, 'editar'])->name('usuario.editar');

     //Rotas Horario Funcionamento
     Route::get('/horario', [HorarioController::class, 'index']);
     Route::post('/horario/add', [HorarioController::class, 'adicionar'])->name('horario.add');

    //Rotas Mensagens
    Route::get('/mensagens', [MensController::class, 'index']);
    Route::get('/mensagens/delete{id}', [MensController::class, 'deletar'])->name('mensagens.delete');
    Route::post('/mensagens/add', [MensController::class, 'adicionar'])->name('mensagens.add');
    Route::post('/mensagens/edit{id}', [MensController::class, 'editar'])->name('mensagens.editar');

    //Rotas de Suporte
    Route::get('/suporte', [ContactController::class,'index'])->name('pages.usuario.usuario');
    Route::post('/suporte', [ContactController::class,'store'])->name('pages.usuario.usuario');

// For Clear cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

});
