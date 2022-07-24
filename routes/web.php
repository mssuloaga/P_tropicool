<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrabajadoreController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\BusquedaController;

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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil');
Route::get('/articulos', [App\Http\Controllers\ArticuloController::class, 'index'])->name('articulos');
Route::get('/articulos/{articulosId}', 'App\Http\Controllers\ArticuloController@show')->name('articulos.show');
Route::get('nosotros', [App\Http\Controllers\NosotrosController::class, 'index'])->name('nosotros');
Route::get('/busqueda', 'App\Http\Controllers\ArticuloController@busqueda')->name('articulos.busqueda');
Route::post('/cart-add', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::get('/cart-checkout', 'App\Http\Controllers\CartController@cart')->name('cart.checkout');
Route::post('/cart-clear', 'App\Http\Controllers\CartController@clear')->name('cart.clear');
Route::post('/cart-removeitem', 'App\Http\Controllers\CartController@removeitem')->name('cart.removeitem');
Route::get('trabajadores/pdf', function () {
    return view('welcome');
});

Route::get('prueba',function(){
    return "holi";
})->middleware('auth','valid');
Route::get('no-autorizado',function(){
    return "pa onde vai peazo e larva";
});


Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil')->middleware('auth');
Route::post('/change/password', [App\Http\Controllers\PerfilController::class, 'changePassword'])->name('changePassword');

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
Route::get('/reset-password/{token}', 'App\Http\Controllers\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/reset-password','App\Http\Controllers\ResetPasswordController@reset')->name('password.update');
Route::post('/importar-productos', [ProductoController::class, 'ProductsImport'])->name('producto.import');
Route::view('/importar-producto', 'producto.producto_import')->name('producto_import');

Route::group(['middleware' => ['auth','valid']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

    Route::resource('posts', App\Http\Controllers\PostController::class);
    Route::resource('perfil', App\Http\Controllers\PerfilController::class);
    Route::get('full-calendar', [App\Http\Controllers\FullCalendarController::class, 'index']);

    Route::post('full-calendar/action', [App\Http\Controllers\FullCalendarController::class, 'action']);

    Route::resource('events', App\Http\Controllers\EventController::class);
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('categorias', App\Http\Controllers\CategoriaController::class);
    Route::resource('trabajadores', App\Http\Controllers\TrabajadoreController::class);
    Route::resource('empresas', App\Http\Controllers\EmpresaController::class);
    Route::resource('productos', App\Http\Controllers\ProductoController::class);
    Route::resource('stocks', App\Http\Controllers\StockController::class);
    Route::get('/download_pdfempresas', [App\Http\Controllers\EmpresaController::class, 'downloadPdf']);
    Route::get('/download_pdfusers', [App\Http\Controllers\UserController::class, 'downloadPdf']);
    Route::get('/download_pdfproductos', [App\Http\Controllers\ProductoController::class, 'downloadPdf']);
    Route::get('/download_pdfcategorias', [App\Http\Controllers\CategoriaController::class, 'downloadPdf']);
    Route::get('/download_pdftrabajadores', [App\Http\Controllers\TrabajadoreController::class, 'downloadPdf']);
    Route::get('/download_pdfstocks', [App\Http\Controllers\StockController::class, 'downloadPdf']);
});
