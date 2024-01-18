<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Grade\CreateGradeRequest;
use App\Http\Requests\Grade\UpdateGradeRequest;
use App\Repositories\Grade\GradeRepositoryInterface;
use App\Repositories\Grade\StudentGrade\StudentGradeRepositoryInterface;
use App\Repositories\Grade\TeacherGrade\TeacherGradeRepositoryInterface;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    protected $gradeRepo;
    protected $studentGradeRepo;
    protected $teacherGradeRepo;

    public function __construct(
        GradeRepositoryInterface $gradeRepo,
        StudentGradeRepositoryInterface $studentGradeRepo,
        TeacherGradeRepositoryInterface $teacherGradeRepo,
    ) {
        $this->gradeRepo = $gradeRepo;
        $this->studentGradeRepo = $studentGradeRepo;
        $this->teacherGradeRepo = $teacherGradeRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $grade = $this->gradeRepo->getAll();
        return view('admin.grades.index', ['grades' => $grade]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.grades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateGradeRequest $request)
    {
        //
        $array = $request->all();
        // dd($request);
        $gradetRepo = $this->gradeRepo->insertgrade($array);

        return redirect()->route('grades.index')->with(['massage' => 'Create suceess']);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $studentGrades = $this->studentGradeRepo->indexStudent_Grade($slug);
        // dd($studentGrades);
        $teacherGrades = $this->teacherGradeRepo->indexTeacher_Grade($slug);
        // dd($gradegrades);
        return view('admin.grades.view', ['studentgrades' => $studentGrades, 'teacherGrades' => $teacherGrades, 'slugGrade' => $slug]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $gradeRepo = $this->gradeRepo->find($id);
        return view('admin.grades.edit', ['grade' => $gradeRepo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGradeRequest $request, string $id)
    {
        //
        $gradeRepo = $this->gradeRepo->updategrade($request, $id);

        return redirect()->route('grades.index')->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $grade = $this->gradeRepo->delete($id);
        return response()->json([
            'message' => 'Room deteled successfully '
        ]);
    }
}
