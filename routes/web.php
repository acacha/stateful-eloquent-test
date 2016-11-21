<?php

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/transaction', function () {
        $transaction = new \App\Transaction();
        $faker = Faker\Factory::create();
        $transaction->name = $faker->word;
        $transaction->save();
        
        $transaction->process();
        //$transaction->activate();
        $transaction->fail();
        $transaction->process();
        $transaction->activate();
        $transaction->close();
        //$transaction->close();



        $data = [
            "transaction" => $transaction
        ];
        return view('transaction',$data);
    });
});

