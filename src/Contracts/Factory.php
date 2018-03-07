<?php

namespace Arifr007\IBanking\Contracts;

interface Factory
{
    /**
     * Get an bank provider implementation.
     *
     * @param  string  $driver
     * @return \Arifr007\IBanking\Contracts\Provider
     */
    public function driver($driver = null);
}
