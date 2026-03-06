<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Types\Relations\Role;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return view('test');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/halo', function () {
    return "Hallo Laravel";
});

Route::redirect('/home', '/');

Route::fallback(function () {
    return "Page Not Found 404";
});

Route::get('/helloworld}', function () {
    return view('hello.world', ['name' => 'dzaki']);
});     


Route::get('product/{id}', function ($productId) {
    return "Product ID: " . $productId;
})->name('product.detail');

Route::get('product/{id}/item/{item}', function ($productId, $itemId) {
    return "Product ID: " . $productId . ", Item ID: " . $itemId;
})->name('product.item.detail');

Route::get('/categories/{id}', function ($id) {
    return "Category ID: " . $id;
})->where('id', '[0-9]+')->name('category.detail');


Route::get('/users/{id?}', function ($userid = 404) {
    return "User ID: " . $userid;
})->name('user.detail');


Route::get('/product/{id}', function ($id) {
    $link = route('product.detail', ['id' => $id]);
    return "Link: " . $link;
});

Route::get('/produk-redirect/{id}', function ($id) {
    return redirect()->route('product.detail', ['id' => $id]);
})->where('id', '[0-9]+');

Route::get('/controller/hello', [App\Http\Controllers\HelloController::class, 'hello']);

Route::get('/controller/request', [App\Http\Controllers\HelloController::class, 'request']);

Route::get('/input/hello', [App\Http\Controllers\InputController::class, 'hello']);
Route::post('/input/hello', [App\Http\Controllers\InputController::class, 'hello']);

Route::post('/input/hello/first', [App\Http\Controllers\InputController::class, 'hellofirstname']);


Route::post('/input/hello/input', [App\Http\Controllers\InputController::class, 'helloInput']);

Route::post('/input/hello/array', [App\Http\Controllers\InputController::class, 'helloaArray']);    

Route::post('/input/type', [App\Http\Controllers\InputController::class, 'inputType']);

Route::post('/input/filter/only', [App\Http\Controllers\InputController::class, 'filterOnly']);

Route::post('/input/filter/except', [App\Http\Controllers\InputController::class, 'filterExcept']);

Route::post('/input/filter/merge', [App\Http\Controllers\InputController::class, 'filterMerge']);























