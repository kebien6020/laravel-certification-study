<?php

namespace App\Services;

use App\Contracts\DateHelper;
use Carbon\Carbon;

class DateHelperColombia implements DateHelper
{
    public function formatLocal(Carbon $date): string
    {
        return $date->format('d/m/Y h:i a');
    }

    public function timezone(): string
    {
        return 'America/Bogota';
    }
}
