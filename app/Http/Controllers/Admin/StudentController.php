<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Student\StudentRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentsRepo;

    public function __construct(
        StudentRepositoryInterface $studentsRepo,
    ) {
        $this->studentsRepo = $studentsRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = $this->studentsRepo->getAll();
        return view('admin.students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $array = $request->all();
        $student = $this->studentsRepo->insertStudent($array);
        return redirect()->route('students.index')->with(['message' => 'Create Student suceess']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $student = $this->studentsRepo->find($id);

        if (!$student) {
            return redirect()->route('admin.students.index')->with('error', 'Student not found.');
        }

        return view('admin.students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $students = $this->studentsRepo->find($id);
        return view('admin.students.edit', ['students' => $students]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $array = $request->all();
        $student = $this->studentsRepo->updateStudent($array, $id);

        return redirect()->route('students.index')->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = $this->studentsRepo->deleteStudent($id);

        return response()->json([
            'message' => 'Student deteled successfully '
        ]);
    }
}
