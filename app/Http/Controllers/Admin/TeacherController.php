<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class TeacherController extends Controller
{

    protected $teacherRepo;

    public function __construct(
        TeacherRepositoryInterface $teacherRepo,
    ) {
        $this->teacherRepo = $teacherRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd($this->teacherRepo);
        $teacher = $this->teacherRepo->getAll();
        //dd($teacher);
        return view('admin.teachers.index', ['teachers' => $teacher]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $array = $request->all();
        $teacher = $this->teacherRepo->insertTeacher($array);
        return redirect()->route('teachers.index')->with(['message' => 'Create Teacher suceess']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $teacher = $this->teacherRepo->findById($id);

        if (!$teacher) {
            return redirect()->route('admin.teachers.index')->with('error', 'Teacher not found.');
        }
        $check = $this->teacherRepo->checkAccountTeacher($id);
        return view('admin.teachers.show', ['teacher' => $teacher, 'check' => $check]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $teachers = $this->teacherRepo->find($id);
        return view('admin.teachers.edit', ['teachers' => $teachers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $array = $request->all();
        $teacher = $this->teacherRepo->updateTeacher($array, $id);

        return redirect()->route('teachers.index')->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = $this->teacherRepo->deleteTeacher($id);

        return response()->json([
            'message' => 'Teacher deteled successfully '
        ]);
    }
}
