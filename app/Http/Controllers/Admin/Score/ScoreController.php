<?php

namespace App\Http\Controllers\Admin\Score;

use App\Http\Controllers\Controller;
use App\Models\Scores;
use App\Models\Subject;
use App\Models\Teacher;
use App\Repositories\Department\DepartmentRepositoryInterface;
use App\Repositories\Grade\GradeRepositoryInterface;
use App\Repositories\Grade\StudentGrade\StudentGradeRepositoryInterface;
use App\Repositories\Grade\TeacherGrade\TeacherGradeRepositoryInterface;
use App\Repositories\Score\ScoreRepositoryInterface;
use App\Repositories\Student\StudentRepositoryInterface;
use App\Repositories\Subject\SubjectRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    protected $departmentRepo;
    protected $studentGradeRepo;
    protected $teacherGradeRepo;
    protected $subjectRepo;
    protected $scoreRepo;
    protected $studentRepo;
    protected $gradeRepo;

    public function __construct(
        StudentGradeRepositoryInterface $studentGradeRepo,
        TeacherGradeRepositoryInterface $teacherGradeRepo,
        DepartmentRepositoryInterface $departmentRepo,
        SubjectRepositoryInterface $subjectRepo,
        ScoreRepositoryInterface $scoreRepo,
        StudentRepositoryInterface $studentRepo,
        GradeRepositoryInterface $gradeRepo,
    ) {
        $this->departmentRepo = $departmentRepo;
        $this->studentGradeRepo = $studentGradeRepo;
        $this->teacherGradeRepo = $teacherGradeRepo;
        $this->subjectRepo = $subjectRepo;
        $this->scoreRepo = $scoreRepo;
        $this->studentRepo = $studentRepo;
        $this->gradeRepo = $gradeRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department = $this->departmentRepo->getAll();
        return view('admin.scores.index', ['departments' => $department]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showStudentClass($slugClass)
    {
        $studentGrades = $this->studentGradeRepo->indexStudent_Grade($slugClass);
        $teacherGrade = $this->teacherGradeRepo->indexHomeroomTeacher_Grade($slugClass);
        return view('admin.scores.show', ['studentgrades' => $studentGrades, 'teacherGrade' => $teacherGrade, 'slugGrade' => $slugClass]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addScore($slugGrade)
    {
        // dd(Auth::user()->teachers->first()->slug);
        if (Auth::user()->teachers->first()) {
            $subjects = $this->subjectRepo->getallSubjectToSlugTeacher(Auth::user()->teachers->first()->slug);
        } else {
            $subjects = $this->subjectRepo->getAll();
        }
        $grades = $this->gradeRepo->getGradeToSlug($slugGrade);
        $allstudentIds = $this->studentGradeRepo->getAllstudentIds();
        $students = $this->scoreRepo->getStudentsNotInGradeScorce($grades->id, $allstudentIds);
        // dd($grades);
        return view('admin.scores.add', ['subjects' => $subjects, 'slugGrade' => $slugGrade, 'students' => $students]);
    }


    public function add(Request $request, string $slugGrade)
    {
        $array = $request->all();
        $students = $this->scoreRepo->addScore($array);

        return redirect()->route('scores.show', $slugGrade)->with(['message' => 'Add success']);
    }

    public function viewScore(string $slugGrade, string $slugStudent)
    {
        $scores = $this->scoreRepo->viewScore($slugStudent);
        return view('admin.scores.view', ['slugGrade' => $slugGrade, 'slugStudent' => $slugStudent, 'scores' => $scores]);
    }


    public function editScore(string $slugGrade, string $slugStuden, string $id)
    {
        $score = $this->scoreRepo->find($id);
        $student = $this->studentRepo->getStudentToSlug($slugStuden);
        return view('admin.scores.edit', ['score' => $score, 'student' => $student, 'slugGrade' => $slugGrade]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slugGrade, string $score_id)
    {
        $array = $request->all();
        $score = $this->scoreRepo->updateScore($array, $score_id);

        return redirect()->route('scores.show', $slugGrade)->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
