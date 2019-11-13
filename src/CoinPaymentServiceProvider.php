<?php

namespace Jybtx\CoinPayment;

use Illuminate\Support\ServiceProvider;
use Jybtx\HuoBiApi\CoinPaymentClientApi;

class CoinPaymentServiceProvider extends ServiceProvider
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
            __DIR__."/../../config/coin-payment.php", 'coin-payment'
        );
    }
    /**
     * Configure package paths.
     */
    private function configurePaths()
    {
        $this->publishes([
            __DIR__."/../../config/coin-payment.php" => config_path('coin-payment.php'),
        ],'coin-payment');
    }
    /**
     * [getRegisterSingleton description]
     * @author jybtx
     * @date   2019-11-01
     * @return [type]     [description]
     */
    private function getRegisterSingleton()
    {
    	$this->app->singleton('CoinPayment', function ($app) {
            $config = isset($app['config']['services']['coin-payment'])?$app['config']['services']['coin-payment']:null;
            if ( is_null( $config ) ) {
                $config = $app['config']['coin-payment'] ?: $app['config']['coin-payment::config'];
            }
            return new CoinPaymentClientApi($config['coin_payment_api_private_key'], $config['coin_payment_api_public_key'],$config['coin_payment_api_url']);
        });
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