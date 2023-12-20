<?php

namespace App\Repositories\Teacher;


use Intervention\Image\Facades\Image;


use Illuminate\Http\UploadedFile;
use App\Repositories\BaseRepository;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Support\Str;

class TeacherRepository extends BaseRepository implements TeacherRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Teacher::class;
    }

    public function getTeacher()
    {
        return $this->model->select('Teacher_name')->take(5)->get();
    }

    public function findById(string $id)
    {
        return $this->model->find($id);
    }

    public function insertTeacher($attributes = [])
    {
        // Implement your logic to insert a user here
    }

    public function updateTeacher($attributes = [], $id)
    {
        // Implement your logic to update a user here
        $result = $this->model->find($id);
        $attributes['slug'] = Str::slug($attributes['name']);

        if ($result) {
            $image_personal = $attributes['image_personal'];
            if ($image_personal instanceof UploadedFile) {
                $imagePath = 'admin/build/images/';
                $imageName = 'personal_image_' . time() . '.' . $image_personal->getClientOriginalExtension();
                $image_personal->move(public_path($imagePath), $imageName);
                $updateData['image_personal'] = $imagePath . $imageName;
            }

            $image_citizenIdentification = $attributes['image_citizenIdentification'];
            if ($image_citizenIdentification instanceof UploadedFile) {
                $imagePath = 'admin/build/images/';
                $imageName = 'personal_image_' . time() . '.' . $image_citizenIdentification->getClientOriginalExtension();
                $image_citizenIdentification->move(public_path($imagePath), $imageName);
                $updateData['image_citizenIdentification'] = $imagePath . $imageName;
            }
            // Extract only the relevant attributes for the update
            $updateData = [
                'name' => $attributes['name'],
                'birthday' => $attributes['birthday'],
                'gender' => $attributes['gender'],
                'phone' => $attributes['phone'],
                'hometown' => $attributes['hometown'],
                'description' => $attributes['description'],
                'slug' => $attributes['slug'],
                // Add other attributes as needed
            ];

            // Use the update method with the extracted attributes
            $result->update($updateData);

            return $result;
        }
        return false;
    }
}
