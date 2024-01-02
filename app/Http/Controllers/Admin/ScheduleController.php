<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Rank\RankRepositoryInterface;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    protected $teacherRepo;
    protected $rankRepo;

    public function __construct(
        TeacherRepositoryInterface $teacherRepo,
        RankRepositoryInterface $rankRepo,
    ) {
        $this->teacherRepo = $teacherRepo;
        $this->rankRepo = $rankRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacherSchedules = $this->teacherRepo->getAll();
        return view('admin.schedules.index', ['teacherSchedules' => $teacherSchedules]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
    public function show(string $slug)
    {
        $ranks = $this->rankRepo->getAll();
        return view('admin.schedules.showteacher', ['ranks' => $ranks]);
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
