<?php

namespace App\Http\Controllers\Admin\Department;

use App\Http\Controllers\Controller;
use App\Repositories\Department\DepartmentRepositoryInterface;
use App\Repositories\Department\GradeDepartment\GradeDepartmentRepositoryInterface;
use App\Repositories\Grade\GradeRepositoryInterface;
use Illuminate\Http\Request;

class Grade__DepartmentsController extends Controller
{
    protected $departmentRepo;
    protected $gradeRpo;
    protected $gradeDepartmentRepo;

    public function __construct(
        DepartmentRepositoryInterface $departmentRepo,
        GradeRepositoryInterface $gradeRpo,
        GradeDepartmentRepositoryInterface $gradeDepartmentRepo
    ) {
        $this->departmentRepo = $departmentRepo;
        $this->gradeRpo = $gradeRpo;
        $this->gradeDepartmentRepo = $gradeDepartmentRepo;
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
        $departements = $this->departmentRepo->getAll();
        $allgradeIds = $this->gradeDepartmentRepo->getAllGradeIds();
        $grades = $this->gradeDepartmentRepo->getGradesNotInDepartment($allgradeIds);
        // dd($grades);
        return view('admin.departments.gradesDepartments.add', ['departements' => $departements, 'grades' => $grades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $all = $request->all();
        $departement_grade = $this->gradeDepartmentRepo->create($all);

        return redirect()->route('departments.index')->with(['message' => 'Create success']);
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
    public function edit(string $slugDepartment, string $id)
    {
        $departements = $this->gradeDepartmentRepo->edit_Department($slugDepartment);
        $departement_selected = $this->gradeDepartmentRepo->index_Department($slugDepartment);
        $grades = $this->gradeRpo->find($id);

        // dd($grades);
        return view('admin.departments.gradesDepartments.edit', ['departements' => $departements, 'grade' => $grades, 'departement_selected' => $departement_selected]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idgrade)
    {
        $all = $request->all();
        $departement_grade = $this->gradeDepartmentRepo->updateGrade_Department($idgrade, $all);

        return redirect()->route('departments.index')->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
