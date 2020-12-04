<?php

namespace App\Facades;

use App\Contracts\DateHelper;
use Illuminate\Support\Facades\Facade;

class Date extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return DateHelper::class;
    }
}
