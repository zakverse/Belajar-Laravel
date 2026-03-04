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