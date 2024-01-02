<?php

namespace App\Repositories\Room;

use App\Repositories\RepositoryInterface;

interface RoomRepositoryInterface extends RepositoryInterface
{
    public function insertRoom($attributes = []);
    public function updateRoom($attributes = [], $id);
}
