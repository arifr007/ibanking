<?php

namespace Arifr007\IBanking\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Arifr007\IBanking\IBankingManager
 */
class IBanking extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Arifr007\IBanking\Contracts\Factory';
    }
}
