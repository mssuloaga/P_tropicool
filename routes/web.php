<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrabajadoreController;

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
Route::get('trabajadores/pdf', function () {
    return view('welcome');
});

Route::get('/reset-password/{token}', 'app\Http\Controllers\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) use ($request) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();

            $user->setRememberToken(Str::random(60));

            event(new PasswordReset($user));
        }
    );

    return $status == Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => __($status)]);
})->middleware(['guest'])->name('password.update');
Route::post('/reset-password', 'app\Http\Controllers\ResetsPaswords@reset')->name('password.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

    Route::resource('posts', App\Http\Controllers\PostController::class);
    Route::resource('perfil', App\Http\Controllers\PerfilController::class);


    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('categorias', App\Http\Controllers\CategoriaController::class);
    Route::resource('trabajadores', App\Http\Controllers\TrabajadoreController::class);
    Route::resource('eventos', App\Http\Controllers\EventoController::class);
    Route::resource('empresas', App\Http\Controllers\EmpresaController::class);
    Route::resource('productos', App\Http\Controllers\ProductoController::class);
    Route::resource('calendarios', App\Http\Controllers\CalendarioController::class);
    Route::resource('stocks', App\Http\Controllers\StockController::class);
    Route::get('/download_pdfempresas', [App\Http\Controllers\EmpresaController::class, 'downloadPdf']);
    Route::get('/download_pdfusers', [App\Http\Controllers\UserController::class, 'downloadPdf']);
    Route::get('/download_pdfproductos', [App\Http\Controllers\ProductoController::class, 'downloadPdf']);
    Route::get('/download_pdfcategorias', [App\Http\Controllers\CategoriaController::class, 'downloadPdf']);
    Route::get('/download_pdftrabajadores', [App\Http\Controllers\TrabajadoreController::class, 'downloadPdf']);
    Route::get('/download_pdfeventos', [App\Http\Controllers\EventoController::class, 'downloadPdf']);
    Route::get('/download_pdfstocks', [App\Http\Controllers\StockController::class, 'downloadPdf']);
    Route::get('/calendario', [App\Http\Controllers\CalendarioController::class, 'index']);
});
