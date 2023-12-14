<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Classs\ClassRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    protected $classtmentRepo;

    public function __construct(
        ClassRepositoryInterface $classtmentRepo,
    ) {
        $this->classtmentRepo = $classtmentRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $class = $this->classtmentRepo->getAll();
        //dd($teacher);
        return view('admin.classes.index', ['classes' => $class]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.classes.create');
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
        $class = $this->classtmentRepo->delete($id);
        return response()->json([
            'message' => 'Story deteled successfully '
        ]);
    }
}
