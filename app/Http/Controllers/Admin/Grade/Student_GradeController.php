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
    protected $studentgradeRepo;

    public function __construct(
        GradeRepositoryInterface $gradeRepo,
        StudentRepositoryInterface $studentRpo,
        StudentGradeRepositoryInterface $studentgradeRepo
    ) {
        $this->gradeRepo = $gradeRepo;
        $this->studentRpo = $studentRpo;
        $this->studentgradeRepo = $studentgradeRepo;
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
        $allstudentIds = $this->studentgradeRepo->getAllstudentIds();
        $students = $this->studentgradeRepo->getstudentsNotIngrade($allstudentIds);
        // dd($students);
        return view('admin.grades.studentsgrades.add', ['grades' => $grades, 'students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $all = $request->all();

        $grade_student = $this->studentgradeRepo->createStudentGrade($all);

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
    public function edit(string $sluggrade, string $id)
    {
        $grades = $this->studentgradeRepo->edit_grade($sluggrade);
        $grade_selected = $this->studentgradeRepo->index_grade($sluggrade);
        $students = $this->studentRpo->find($id);

        // dd($students);
        return view('admin.grades.studentsgrades.edit', ['grades' => $grades, 'student' => $students, 'grade_selected' => $grade_selected]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idstudent)
    {
        $all = $request->all();
        $grade_student = $this->studentgradeRepo->updatestudent_grade($idstudent, $all);

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
