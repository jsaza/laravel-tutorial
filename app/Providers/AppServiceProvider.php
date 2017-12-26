<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * アプリケーションサービスの初期化処理
     *
     * @return void
     */
    public function boot()
    {
        //スキーマの文字列の長さを190にセット
        \Schema::defaultStringLength(191);
        //httpsアクセスを有効にする
        \URL::forceScheme('https');
    }

    /**
     * アプリケーションサービスの登録
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
