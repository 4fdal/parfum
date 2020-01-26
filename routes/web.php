<?php

Route::get('/login', 'UserController@login')->name('user.login');
Route::get('/register', 'UserController@register')->name('user.register');

Route::group(['prefix' => 'home'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    Route::group(['prefix' => 'jenis'], function () {
        Route::get('/', 'JenisController@index')->name('jenis.index');
        Route::get('/create', 'JenisController@createIndex')->name('jenis.create.index');
        Route::get('/update/{id}', 'JenisController@updateIndex')->name('jenis.update.index');
        Route::post('/', 'JenisController@create')->name('jenis.create');
        Route::put('/{id}', 'JenisController@update')->name('jenis.update');
        Route::delete('/{id}', 'JenisController@delete')->name('jenis.delete');
    });

    Route::group(['prefix' => 'gambar'], function () {
        Route::get('/', 'GambarController@index')->name('gambar.index');
        Route::get('/create', 'GambarController@createIndex')->name('gambar.create.index');
        Route::get('/update/{id}', 'GambarController@updateIndex')->name('gambar.update.index');
        Route::post('/', 'GambarController@create')->name('gambar.create');
        Route::put('/{id}', 'GambarController@update')->name('gambar.update');
        Route::delete('/{id}', 'GambarController@delete')->name('gambar.delete');
    });

    Route::group(['prefix' => 'harga'], function () {
        Route::get('/', 'HargaController@index')->name('harga.index');
        Route::get('/create', 'HargaController@createIndex')->name('harga.create.index');
        Route::get('/update/{id}', 'HargaController@updateIndex')->name('harga.update.index');
        Route::post('/', 'HargaController@create')->name('harga.create');
        Route::put('/{id}', 'HargaController@update')->name('harga.update');
        Route::delete('/{id}', 'HargaController@delete')->name('harga.delete');
    });

    Route::group(['prefix' => 'pelanggan'], function () {
        Route::get('/', 'PelangganController@index')->name('pelanggan.index');
        Route::get('/create', 'PelangganController@createIndex')->name('pelanggan.create.index');
        Route::get('/update/{id}', 'PelangganController@updateIndex')->name('pelanggan.update.index');
        Route::post('/', 'PelangganController@create')->name('pelanggan.create');
        Route::put('/{id}', 'PelangganController@update')->name('pelanggan.update');
        Route::delete('/{id}', 'PelangganController@delete')->name('pelanggan.delete');
    });

    Route::group(['prefix' => 'pembelian'], function () {
        Route::get('/', 'PembelianController@index')->name('pembelian.index');
        Route::get('/create', 'PembelianController@createIndex')->name('pembelian.create.index');
        Route::get('/update/{id}', 'PembelianController@updateIndex')->name('pembelian.update.index');
        Route::post('/', 'PembelianController@create')->name('pembelian.create');
        Route::put('/{id}', 'PembelianController@update')->name('pembelian.update');
        Route::delete('/{id}', 'PembelianController@delete')->name('pembelian.delete');
    });

    Route::group(['prefix' => 'penjualan'], function () {
        Route::get('/', 'PenjualanController@index')->name('penjualan.index');
        Route::get('/create', 'PenjualanController@createIndex')->name('penjualan.create.index');
        Route::get('/update/{id}', 'PenjualanController@updateIndex')->name('penjualan.update.index');
        Route::post('/', 'PenjualanController@create')->name('penjualan.create');
        Route::put('/{id}', 'PenjualanController@update')->name('penjualan.update');
        Route::delete('/{id}', 'PenjualanController@delete')->name('penjualan.delete');
    });

    Route::group(['prefix' => 'stok'], function () {
        Route::get('/', 'StokController@index')->name('stok.index');
        Route::get('/create', 'StokController@createIndex')->name('stok.create.index');
        Route::get('/update/{id}', 'StokController@updateIndex')->name('stok.update.index');
        Route::post('/', 'StokController@create')->name('stok.create');
        Route::put('/{id}', 'StokController@update')->name('stok.update');
        Route::delete('/{id}', 'StokController@delete')->name('stok.delete');
    });

    Route::group(['prefix' => 'total_pembelian'], function () {
        Route::get('/', 'TotalPembelianController@index')->name('total_pembelian.index');
    });

    Route::group(['prefix' => 'total_penjualan'], function () {
        Route::get('/', 'TotalPenjualanController@index')->name('total_penjualan.index');
    });

    Route::group(['prefix' => 'report'], function () {
        Route::get('/', 'ReportController@index')->name('report.index');
    });
});