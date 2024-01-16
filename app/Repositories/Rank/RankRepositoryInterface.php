<?php

namespace App\Repositories\Rank;

use App\Repositories\RepositoryInterface;

interface RankRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function checkRank($slugTeacher);
}
