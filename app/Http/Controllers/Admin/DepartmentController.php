<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Department\CreateDepartmentRequest;
use App\Http\Requests\Department\UpdateDepartmentRequest;
use App\Repositories\Department\DepartmentRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Repositories\Department\GradeDepartment\GradeDepartmentRepositoryInterface;
use App\Repositories\Department\TeacherDepartment\TeacherDepartmentRepositoryInterface;

class DepartmentController extends Controller
{

    protected $departmentRepo;
    protected $teacherDepartmentRepo;
    protected $gradeDepartmentRepo;

    public function __construct(
        DepartmentRepositoryInterface $departmentRepo,
        TeacherDepartmentRepositoryInterface $teacherDepartmentRepo,
        GradeDepartmentRepositoryInterface $gradeDepartmentRepo
    ) {
        $this->departmentRepo = $departmentRepo;
        $this->teacherDepartmentRepo = $teacherDepartmentRepo;
        $this->gradeDepartmentRepo = $gradeDepartmentRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $department = $this->departmentRepo->getAll();
        //dd($teacher);
        return view('admin.departments.index', ['departments' => $department]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDepartmentRequest $request)
    {
        //
        $array = $request->all();
        // dd($request);
        $departmentRepo = $this->departmentRepo->insertDepartment($array);
        $department = new Department($departmentRepo);
        return redirect()->route('departments.index')->with(['massage' => 'Create suceess']);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $teacherDepartments = $this->teacherDepartmentRepo->indexTeacher_Department($slug);
        // dd($teacherDepartments);
        $gradeDepartments = $this->gradeDepartmentRepo->indexGrade_Department($slug);
        // dd($gradeDepartments);
        return view('admin.departments.view', ['teacherDepartments' => $teacherDepartments, 'gradeDepartments' => $gradeDepartments, 'slugDepartment' => $slug]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $departmentRepo = $this->departmentRepo->find($id);
        return view('admin.departments.edit', ['department' => $departmentRepo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, string $id)
    {
        //
        $department = $this->departmentRepo->updateDepartment($request, $id);

        return redirect()->route('departments.index')->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $department = $this->departmentRepo->delete($id);
        return response()->json([
            'message' => 'Story deteled successfully '
        ]);
    }
}
