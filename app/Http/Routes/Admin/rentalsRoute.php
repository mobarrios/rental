<?php

Route::group(['prefix'=>'rentals'],function(){

        $section =  'colors';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.rentals.destroy','uses'=>'Admin\RentalsController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.rentals.edit','uses'=>'Admin\RentalsController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.rentals.update','uses'=>'Admin\RentalsController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.rentals.create','uses'=>'Admin\RentalsController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.rentals.store','uses'=>'Admin\RentalsController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.rentals.show','uses'=>'Admin\RentalsController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.rentals.index','uses'=>'Admin\RentalsController@index']);

        Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.rentals.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

        Route::get('addItem/{id?}/{q?}', ['as' => 'admin.rentals.addItem','uses'=>'Admin\RentalsController@addItem']);
        Route::get('postAddItem/{id?}/{items_id?}/{total?}', ['as' => 'admin.rentals.postAddItem','uses'=>'Admin\RentalsController@postAddItem']);

        Route::get('/recibo/{id?}',  ['as'=>'admin.rentals.recibo','uses'=>'Admin\RentalsController@recibo']);

        Route::get('/reCalculate/{id?}',  ['as'=>'admin.rentals.reCalculate','uses'=>'Admin\RentalsController@reCalculate']);


});
