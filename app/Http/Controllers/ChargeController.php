<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class ChargeController extends Controller
{
    public $plans = [
        'micro' => ['amount' => 1490, 'description' => '1490 円(税込)/月'],
        'small' => ['amount' => 4800, 'description' => '4800 円(税込)/月'],
        'medium' => ['amount' => 6900, 'description' => '6900 円(税込)/月'],
    ];
    
    /**
     * 新しいコントローラインスタンスの生成
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($plan)
    {
        logger($plan);
        $params = array();
        if ($this->plans[$plan]) {
            $params = $this->plans[$plan];
        }
        
        return view('charge.input', compact('params'));
    }
    
    
    public function payment(Request $request){
        logger('payment');
        // キーの設定
        \Stripe\Stripe::setApiKey(Config::get("services.stripe.secret"));
        // トークンを作る
        $token=\Stripe\Token::create(array(
            "card" =>  [
              "number" => $request->input("number"),
              "exp_month" => $request->input("exp_month"),
              "exp_year" => $request->input("exp_year"),
              "cvc" => $request->input("cvc"),
              "name" => $request->input("name")
            ]
        ));
        // 決済
        $charge=\Stripe\Charge::create(array(
            "amount" => $request->input("amount"),
            "currency" => "jpy",
            "source" => $token,
            "description" => $request->input("description"),
            "capture"=>true
        ));
        dd($charge);
        return view('charge.confirm');
    }
    
}
