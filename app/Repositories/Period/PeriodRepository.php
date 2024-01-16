<?php

namespace App\Repositories\Period;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class PeriodRepository extends BaseRepository implements PeriodRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Period::class;
    }

    public function getPeriodToRank()
    {
        $period = $this->model->all();
        return $period;
    }

    public function getPeriodSlug($slug)
    {
        $period = $this->model->where('slug', $slug)->first();
        // dd($period);
        $period_id = $period->id;
        return $period_id;
    }
}
