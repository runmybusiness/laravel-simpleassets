<?php

namespace RunMyBusiness\Assets\Facades;

use Illuminate\Support\Facades\Facade;

class SimpleAssets extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'simpleassets';
    }
}
