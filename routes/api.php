<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group( function(){
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

/*     Route::get('/tasks', [TaskController::class, 'index'])->name('get.tasks');
    Route::get('/tasks/p/{page}', [TaskController::class, 'paginate'])->name('get.paginate.tasks');
    Route::get('/task/{id}', [TaskController::class, 'show'])->name('get.task');
    Route::post('/create/task', [TaskController::class, 'store'])->name('post.task');
    Route::put('/update/task/{id}', [TaskController::class, 'update'])->name('update.task');
    Route::delete('/delete/task/{id}', [TaskController::class, 'delete'])->name('delete.task');   */
});

Route::post('/generate_token', function(Request $request){
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $token = Auth::user()->createToken($request->email);
        return response()->json([
            'usuario' => Auth::user()->email,
            'token' => $token->plainTextToken
            ], 201);
    }
    else
    {
        return response()->json(['messageError' => 'error de autenticación'], 
                        403);
    }    
});



Route::resource('tasks', App\Http\Controllers\API\TaskAPIController::class);
