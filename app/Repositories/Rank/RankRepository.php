<?php

namespace App\Repositories\Rank;

use App\Repositories\BaseRepository;
use App\Repositories\Rank\RankRepositoryInterface;
use Illuminate\Support\Str;

class RankRepository extends BaseRepository implements RankRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Rank_Schedule::class;
    }
}
