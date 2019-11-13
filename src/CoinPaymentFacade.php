<?php

namespace Jybtx\CoinPayment;

use Illuminate\Support\Facades\Facade;

class CoinPaymentFacade extends Facade
{
	
	protected static function getFacadeAccessor()
    {
        return 'CoinPayment';
    }
}