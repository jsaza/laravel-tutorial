<?php

/*
|--------------------------------------------------------------------------
| Webルート
|--------------------------------------------------------------------------
|
| ここでアプリケーションのWebルートを登録できます。"web"ルートは
| ミドルウェアのグループの中へ、RouteServiceProviderによりロード
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/charge/{plan}', 'ChargeController@index')->name('charge');

Route::post('/payment', 'ChargeController@payment');
//決済オブジェクト一覧を取得する
Route::get("/payment/list",function(Request $request){
  // キーの設定
  \Stripe\Stripe::setApiKey(Config::get("services.stripe.secret"));
  // 決済一覧を50件取得
  $chargeList=\Stripe\Charge::all(array("limit" =>50));
  return view("stripe/index",["chargeList"=>$chargeList]);
});
//決済を仮売上から実売上にする
Route::any("capture/{id}",function($id){
  // キーの設定
  \Stripe\Stripe::setApiKey(Config::get("services.stripe.secret"));
  // 実売上に変更
  $ch = \Stripe\Charge::retrieve($id);
  $ch->capture();
  return back();
});
//決済を全額払い戻し
Route::any("refund/{id}",function($id){
  // キーの設定
  \Stripe\Stripe::setApiKey(Config::get("services.stripe.secret"));
  // 払い戻し
  $re = \Stripe\Refund::create(array(
    "charge" => $id
  ));
  return back();
});
//決済を一部払い戻し
Route::post("refund-amount/",function(Request $request){
  // キーの設定
  \Stripe\Stripe::setApiKey(Config::get("services.stripe.secret"));
  // 払い戻し
  $re = \Stripe\Refund::create(array(
    "charge" => $request->input("id"),
    "amount" =>$request->input("amount",0),
  ));
  return back();
});