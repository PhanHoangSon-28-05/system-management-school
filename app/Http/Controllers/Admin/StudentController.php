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
