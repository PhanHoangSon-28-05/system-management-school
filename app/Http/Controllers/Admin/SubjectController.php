<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Subject\SubjectRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subject\CreateSubjecttRequest;
use App\Http\Requests\Subject\UpdateSubjecttRequest;
use App\Models\Subject;

class SubjectController extends Controller
{

    protected $subjectRepo;

    public function __construct(
        SubjectRepositoryInterface $subjectRepo,
    ) {
        $this->subjectRepo = $subjectRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subjects = $this->subjectRepo->getAll();
        return view('admin.subjects.index', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSubjecttRequest $request)
    {
        //
        $array = $request->all();
        // dd($request);
        $subjectRepo = $this->subjectRepo->insertSubject($array);
        $subject = new Subject($subjectRepo);
        return redirect()->route('subjects.index')->with(['massage' => 'Create suceess']);
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
        $subjectRepo = $this->subjectRepo->find($id);
        return view('admin.subjects.edit', ['subject' => $subjectRepo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjecttRequest $request, string $id)
    {
        //
        $subject = $this->subjectRepo->updateSubject($request, $id);

        return redirect()->route('subjects.index')->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = $this->subjectRepo->delete($id);
        return response()->json([
            'message' => 'Subject deteled successfully'
        ]);
    }
}
