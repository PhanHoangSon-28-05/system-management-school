<?php

namespace App\Repositories\Score;

use App\Models\Detail_Scores;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ScoreRepository extends BaseRepository implements ScoreRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Scores::class;
    }

    public function getStudentsNotInGradeScorce($gradeId, $allStudentIds)
    {
        /*
        1. Grade::find($gradeId): Tìm đối tượng Grade dựa trên $gradeId. Điều này giả sử rằng $gradeId là một giá trị chính xác của id trong bảng grades.

        2. ->students(): Sử dụng quan hệ students() đã được định nghĩa trong model Grade. Điều này trả về một query builder cho quan hệ BelongsToMany giữa Grade và Student.

        3.->whereNotIn('students.id', ...): Thực hiện điều kiện để chọn những sinh viên không nằm trong danh sách $allStudentIds. students.id là trường id trong bảng students.

        4.Trong hàm whereNotIn, chúng ta sử dụng một subquery để chọn các sinh viên đã có trong bảng scores với điều kiện cụ thể.
        5.  $query->select('student_id'): Chọn trường student_id từ bảng scores.
        6. $query->from('scores'): Chọn bảng scores.
        7. $query->where('teacher_id', $gradeId): Chọn các dòng có giá trị teacher_id trùng với $gradeId.
        8. $query->whereIn('student_id', $allStudentIds): Chọn các dòng có giá trị student_id nằm trong danh sách $allStudentIds.*/
        $students = Grade::find($gradeId)
            ->students()
            ->whereNotIn('students.id', function ($query) use ($gradeId, $allStudentIds) {
                $query->select('student_id')
                    ->from('scores')
                    ->whereIn('student_id', $allStudentIds);
            })
            ->get();

        return $students;
    }

    public function addScore($attributes = [])
    {
        $teacher = Teacher::whereHas('users', function ($query) {
            $query->where('user_id', Auth::id());
        })->first();
        $teacher_id = $teacher->id;
        $attributes['teacher_id'] = $teacher_id;

        $create_scorce = $this->model->create($attributes);

        $score = $this->model->where('subject_id', $attributes['subject_id'])->where('teacher_id', $teacher_id)->where('student_id', $attributes['student_id'])->first();
        $score_id = $score->id;
        $attributes['score_id'] = $score_id;

        $medium_score = (float)$attributes['medium_score'];
        if ($medium_score <= 10  and $medium_score >= 8.5) {
            $attributes['scale_4'] = '4.0';
        } else if ($medium_score <= 8.4  and $medium_score >= 7.8) {
            $attributes['scale_4'] = '3.5';
        } else if ($medium_score <= 7.7  and $medium_score >= 7.0) {
            $attributes['scale_4'] = '3.0';
        } else if ($medium_score <= 6.9  and $medium_score >= 6.3) {
            $attributes['scale_4'] = '2.5';
        } else if ($medium_score <= 6.2  and $medium_score >= 5.5) {
            $attributes['scale_4'] = '2.0';
        } else if ($medium_score <= 5.4 and $medium_score >= 4.8) {
            $attributes['scale_4'] = '1.5';
        } else if ($medium_score <= 4.0 and $medium_score >= 4.7) {
            $attributes['scale_4'] = '1.0';
        } else {
            $attributes['scale_4'] = '0.0';
        }
        // dd($attributes);
        $detailscore = Detail_Scores::create($attributes);

        return $detailscore;
    }

    public function viewscore($slugStudent)
    {
        $student = Student::where('slug', $slugStudent)->first();
        $student_id = $student->id;
        $valueScore =  $this->model->where('student_id', $student_id)->get();
        return $valueScore;
    }

    public function updateScore($attributes = [], $score_id)
    {

        $medium_score = (float)$attributes['medium_score'];
        if ($medium_score <= 10  and $medium_score >= 8.5) {
            $attributes['scale_4'] = '4.0';
        } else if ($medium_score <= 8.4  and $medium_score >= 7.8) {
            $attributes['scale_4'] = '3.5';
        } else if ($medium_score <= 7.7  and $medium_score >= 7.0) {
            $attributes['scale_4'] = '3.0';
        } else if ($medium_score <= 6.9  and $medium_score >= 6.3) {
            $attributes['scale_4'] = '2.5';
        } else if ($medium_score <= 6.2  and $medium_score >= 5.5) {
            $attributes['scale_4'] = '2.0';
        } else if ($medium_score <= 5.4 and $medium_score >= 4.8) {
            $attributes['scale_4'] = '1.5';
        } else if ($medium_score <= 4.0 and $medium_score >= 4.7) {
            $attributes['scale_4'] = '1.0';
        } else {
            $attributes['scale_4'] = '0.0';
        }
        $detailscore = Detail_Scores::where('score_id', $score_id)->first();
        if ($detailscore) {
            $detailscore->update($attributes);
        }
        return $detailscore;
    }
}
