<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Period\PeriodRepositoryInterface;
use App\Repositories\Rank\RankRepositoryInterface;
use App\Repositories\Schedule\ScheduleRepositoryInterface;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    protected $teacherRepo;
    protected $rankRepo, $periodRepo;
    protected $scheduleRepo;

    public function __construct(
        TeacherRepositoryInterface $teacherRepo,
        RankRepositoryInterface $rankRepo,
        PeriodRepositoryInterface $periodRepo,
        ScheduleRepositoryInterface $scheduleRepo,
    ) {
        $this->teacherRepo = $teacherRepo;
        $this->rankRepo = $rankRepo;
        $this->periodRepo = $periodRepo;
        $this->scheduleRepo = $scheduleRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacherSchedules = $this->teacherRepo->getAllTeacher();
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
        $scheduleRanks = [];
        for ($rank_total = 2; $rank_total <= 8; $rank_total++) {
            if ($rank_total) {
                $rankSlug = 'thu-' . $rank_total;
            }
            $scheduleRanks['scheduleRank' . $rank_total] = $this->rankRepo->checkRank($slug, $rankSlug);
        }

        $scheduleProids = [];
        for ($proid_total = 1; $proid_total <= 10; $proid_total++) {
            $periodSlug = 'tiet-' . $proid_total;
            $periodId = $this->periodRepo->getPeriodSlug($periodSlug);
            $scheduleProids['scheduleProid' . $proid_total] = $this->scheduleRepo->getSchedulePeroid($slug, $periodId);
        }
        $periods = $this->periodRepo->getAll();
        return view('admin.schedules.showteacher', [
            'ranks' => $ranks,
            'slugTeacher' => $slug,
            'scheduleProids' => $scheduleProids,
            'scheduleRanks' => $scheduleRanks,
            'periods' => $periods,
        ]);
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
