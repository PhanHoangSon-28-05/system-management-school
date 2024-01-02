<?php

namespace App\Http\Controllers\Admin\Grade;

use App\Http\Controllers\Controller;
use App\Repositories\Grade\GradeRepositoryInterface;
use App\Repositories\Grade\TeacherGrade\TeacherGradeRepositoryInterface;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class Teacher_GradeController extends Controller
{
    protected $gradeRepo;
    protected $teacherRpo;
    protected $teacherGradeRepo;

    public function __construct(
        GradeRepositoryInterface $gradeRepo,
        TeacherRepositoryInterface $teacherRpo,
        TeacherGradeRepositoryInterface $teacherGradeRepo
    ) {
        $this->gradeRepo = $gradeRepo;
        $this->teacherRpo = $teacherRpo;
        $this->teacherGradeRepo = $teacherGradeRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $grades = $this->gradeRepo->getAll();
        $allTeacherIds = $this->teacherGradeRepo->getAllTeacherIds();
        $teachers = $this->teacherGradeRepo->getTeachersNotInGrade($allTeacherIds);
        // dd($teachers);
        return view('admin.grades.teachersGrades.add', ['grades' => $grades, 'teachers' => $teachers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        $departement_selected = $this->teacherGradeRepo->index_Grade($slugGrade);
        $teachers = $this->teacherRpo->find($id);

        // dd($teachers);
        return view('admin.grades.teachersGrades.edit', ['grades' => $grades, 'teacher' => $teachers, 'departement_selected' => $departement_selected]);
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
    public function destroy(string $id)
    {
        //
    }
}
