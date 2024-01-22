<?php

namespace App\Http\Controllers\Admin\Grade;

use App\Http\Controllers\Controller;
use App\Repositories\Grade\GradeRepositoryInterface;
use App\Repositories\Grade\StudentGrade\StudentGradeRepositoryInterface;
use App\Repositories\Student\StudentRepositoryInterface;
use Illuminate\Http\Request;

class Student_GradeController extends Controller
{
    protected $gradeRepo;
    protected $studentRpo;
    protected $studentGradeRepo;

    public function __construct(
        GradeRepositoryInterface $gradeRepo,
        StudentRepositoryInterface $studentRpo,
        StudentGradeRepositoryInterface $studentGradeRepo
    ) {
        $this->gradeRepo = $gradeRepo;
        $this->studentRpo = $studentRpo;
        $this->studentGradeRepo = $studentGradeRepo;
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
    public function add($slugGrade)
    {
        $grades = $this->gradeRepo->getAll();
        $allstudentIds = $this->studentGradeRepo->getAllstudentIds();
        $students = $this->studentGradeRepo->getstudentsNotIngrade($allstudentIds);
        // dd($students);
        return view('admin.grades.studentsgrades.add', ['grades' => $grades, 'students' => $students, 'slugGrade' => $slugGrade]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $all = $request->all();

        $grade_student = $this->studentGradeRepo->createStudentGrade($all);

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
        $grades = $this->studentGradeRepo->edit_grade($slugGrade);
        $grade_selected = $this->studentGradeRepo->index_grade($slugGrade);
        $students = $this->studentRpo->find($id);

        // dd($students);
        return view('admin.grades.studentsgrades.edit', ['grades' => $grades, 'student' => $students, 'grade_selected' => $grade_selected, 'slugGrade' => $slugGrade]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idstudent)
    {
        $all = $request->all();
        $grade_student = $this->studentGradeRepo->updatestudent_grade($idstudent, $all);

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
