<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Classs\ClassRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    protected $classRepo;

    public function __construct(
        ClassRepositoryInterface $classRepo,
    ) {
        $this->classRepo = $classRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $class = $this->classRepo->getAll();
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
        $array = $request->all();
        // dd($request);
        $classtRepo = $this->classRepo->insertClass($array);
        $class = new Grade($classtRepo);
        return redirect()->route('classes.index')->with(['massage' => 'Create suceess']);
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
        $classRepo = $this->classRepo->find($id);
        return view('admin.classes.edit', ['class' => $classRepo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $classRepo = $this->classRepo->updateClass($request, $id);

        return redirect()->route('classes.index')->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $class = $this->classRepo->delete($id);
        return response()->json([
            'message' => 'Story deteled successfully '
        ]);
    }
}
