<?php

namespace App\Repositories\Room;

use App\Repositories\BaseRepository;
use App\Repositories\Room\RoomRepositoryInterface;
use Illuminate\Support\Str;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Room::class;
    }

    public function insertRoom($attributes = [])
    {
        // Implement your logic to insert a user here
        $existingRoom = $this->model->where('name', $attributes['name'])->first();
        if ($existingRoom) {
            return redirect()->back()->withErrors(['name' => 'Room with this name already exists.'])->withInput();
        }

        $attributes['slug'] = Str::slug($attributes['name']);
        $Room = $this->model->create($attributes);

        return $Room->toArray();
    }

    public function updateRoom($attributes = [], $id)
    {
        // Implement your logic to update a user here
        $result = $this->model->find($id);
        $attributes['slug'] = Str::slug($attributes['name']);

        if ($result) {
            $updateData = [
                'name' => $attributes['name'],
                'description' => $attributes['description'],
                'slug' => $attributes['slug'],
            ];

            $result->update($updateData);

            return $result;
        }
        return false;
    }
}
