<?php

namespace App\Repositories\Period;

use App\Repositories\RepositoryInterface;

interface PeriodRepositoryInterface extends RepositoryInterface
{
    public function getPeriodToRank();
    public function getPeriodSlug($slug);
}
