<?php

namespace App\Http\Controllers\Admin\Grade;

use App\Http\Controllers\Controller;
use App\Http\Requests\Grade\Teacher\CreateGradeTeacherRequest;
use App\Repositories\Grade\GradeRepositoryInterface;
use App\Repositories\Grade\TeacherGrade\TeacherGradeRepositoryInterface;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class Teacher_GradeController extends Controller
{
    protected $gradeRepo;
    protected $teacherRepo;
    protected $teacherGradeRepo;

    public function __construct(
        GradeRepositoryInterface $gradeRepo,
        TeacherRepositoryInterface $teacherRepo,
        TeacherGradeRepositoryInterface $teacherGradeRepo
    ) {
        $this->gradeRepo = $gradeRepo;
        $this->teacherRepo = $teacherRepo;
        $this->teacherGradeRepo = $teacherGradeRepo;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add(string $slugGrade)
    {
        $check = $this->teacherGradeRepo->checkHomeroomTeacher($slugGrade);
        $grades = $this->gradeRepo->getAll();
        // $allTeacherIds = $this->teacherGradeRepo->getAllTeacherIds();
        $teachers = $this->teacherRepo->getAll();
        // dd($teachers);
        return view('admin.grades.teachersGrades.add', ['grades' => $grades, 'teachers' => $teachers, 'check' => $check, 'slugGrade' => $slugGrade]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateGradeTeacherRequest $request)
    {
        $all = $request->all();
        $departement_teacher = $this->teacherGradeRepo->createTeacherGrade($all);

        return redirect()->route('grades.index')->with(['message' => 'Create success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slugGrade, string $id)
    {
        $grades = $this->teacherGradeRepo->edit_Grade($slugGrade);
        $grade_selected = $this->teacherGradeRepo->index_Grade($slugGrade);
        $teachersStats = $this->teacherRepo->getTeacherToSlugAndSlugGrade($slugGrade, $id);
        $teachers = $this->teacherRepo->find($id);
        // dd($teachers->first()->status);
        $check = $this->teacherGradeRepo->checkHomeroomTeacher($slugGrade);
        // dd($teachers);
        return view('admin.grades.teachersGrades.edit', ['grades' => $grades, 'teacher' => $teachers, 'grade_selected' => $grade_selected, 'teachersStatus' => $teachersStats, 'check' => $check, 'slugGrade' => $slugGrade]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idTeacher)
    {
        $all = $request->all();
        $departement_teacher = $this->teacherGradeRepo->updateTeacher_Grade($idTeacher, $all);

        return redirect()->route('grades.index')->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slugGrade, string $id)
    {
        $teacher = $this->teacherGradeRepo->deleteTeacherToSlugAndSlugGrade($slugGrade, $id);
        dd($teacher);
        return redirect()->json([
            'message' => 'Teacher deteled in grade successfully'
        ]);
    }
}
