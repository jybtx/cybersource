<?php

namespace Jybtx\Cybersource;


use Illuminate\Support\ServiceProvider;

class CybersourceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfig();
    }
    /**
     * Merge configuration.
     * @author jybtx
     * @date   2019-11-01
     * @return [type]     [description]
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__."/../config/cybersource.php", 'cybersource'
        );
    }
    /**
     * Configure package paths.
     */
    private function configurePaths()
    {
        $this->publishes([
            __DIR__."/../config/cybersource.php" => config_path('cybersource.php'),
        ],'cybersource');
    }
    /**
     * [getRegisterSingleton description]
     * @author jybtx
     * @date   2019-11-01
     * @return [type]     [description]
     */
    private function getRegisterSingleton()
    {
        $this->app->singleton('CyberSource',function($app){
            return new CybsSoapClient();
        });
//        $this->app->singleton('CoinPayment', function ($app) {
//            $config = isset($app['config']['services']['coin-payment'])?$app['config']['services']['coin-payment']:null;
//            if ( is_null( $config ) ) {
//                $config = $app['config']['coin-payment'] ?: $app['config']['coin-payment::config'];
//            }
//            return new CoinPaymentClientApi($config['coin_payment_api_private_key'], $config['coin_payment_api_public_key'],$config['coin_payment_api_url']);
//        });
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->configurePaths();
        $this->getRegisterSingleton();
    }
}