<?php

use App\Models\Gold;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   //create a array of dates from gold model
    $gold = Gold::all()->toArray();
    $k18 = array_column($gold,'k18');
    $k21 = array_column($gold,'k21');
    $k22 = array_column($gold,'k22');
    $traditional = array_column($gold,'traditional');
    $dates = array_column($gold,'created_at');


    return view('gold',['dates'=>$dates,'k18'=>$k18,'k21'=>$k21,'k22'=>$k22,'traditional'=>$traditional]);
});

// Route::get('scrap',function(){
//     //read csv from public  and insert into database
//     $file = fopen(public_path('prices.csv'),"r");
//     while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
//         $product = new Gold();
//         $product->k18 = $data[1];
//         $product->k21 = $data[2];
//         $product->k22 = $data[3];
//         $product->traditional = $data[4];
//         $product->created_at = $data[0].' 00:00:00';
//         $product->save();
//     }
// });
