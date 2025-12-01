<?php

namespace Yadders\RupiahRedenom\Facades;

use Illuminate\Support\Facades\Facade;

class Rupiah extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rupiah-redenom'; 
    }
}