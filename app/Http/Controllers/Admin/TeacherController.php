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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
