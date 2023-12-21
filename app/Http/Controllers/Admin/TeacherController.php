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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        return view('admin.teachers.show', ['teacher' => $teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $teacher = $this->teacherRepo->find($id);
        return view('admin.teachers.edit', ['teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $teacher = $this->teacherRepo->updateTeacher($request, $id);

        return redirect()->route('teachers.index')->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
