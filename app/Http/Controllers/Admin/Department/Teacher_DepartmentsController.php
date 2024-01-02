<?php

namespace App\Http\Controllers\Admin\Department;

use App\Http\Controllers\Controller;
use App\Repositories\Department\DepartmentRepositoryInterface;
use App\Repositories\Department\TeacherDepartment\TeacherDepartmentRepositoryInterface;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class Teacher_DepartmentsController extends Controller
{
    protected $departmentRepo;
    protected $teacherRpo;
    protected $teacherDepartmentRepo;

    public function __construct(
        DepartmentRepositoryInterface $departmentRepo,
        TeacherRepositoryInterface $teacherRpo,
        TeacherDepartmentRepositoryInterface $teacherDepartmentRepo
    ) {
        $this->departmentRepo = $departmentRepo;
        $this->teacherRpo = $teacherRpo;
        $this->teacherDepartmentRepo = $teacherDepartmentRepo;
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
        $allTeacherIds = $this->teacherDepartmentRepo->getAllTeacherIds();
        $teachers = $this->teacherDepartmentRepo->getteachersNotInDepartment($allTeacherIds);
        // dd($teachers);
        return view('admin.departments.teachersDepartments.add', ['departements' => $departements, 'teachers' => $teachers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $all = $request->all();
        $departement_teacher = $this->teacherDepartmentRepo->create($all);

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
        $departements = $this->teacherDepartmentRepo->edit_Department($slugDepartment);
        $departement_selected = $this->teacherDepartmentRepo->index_Department($slugDepartment);
        $teachers = $this->teacherRpo->find($id);

        // dd($teachers);
        return view('admin.departments.teachersDepartments.edit', ['departements' => $departements, 'teacher' => $teachers, 'departement_selected' => $departement_selected]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idTeacher)
    {
        $all = $request->all();
        $departement_teacher = $this->teacherDepartmentRepo->updateTeacher_Department($idTeacher, $all);

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
