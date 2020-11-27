<?php

namespace App\Contracts;

use Carbon\Carbon;

interface DateHelper {
    public function formatLocal(Carbon $date): string;
    public function timezone(): string;
}
