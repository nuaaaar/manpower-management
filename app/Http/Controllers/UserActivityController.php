<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserActivity;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use IntlDateFormatter;

class UserActivityController extends Controller
{
    public function index(Request $request)
    {
        $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
        if (!in_array('user_activity_read', $userPermissions)) {
            return abort(404);
        }
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $data['users'] = User::all();

        $data['title'] = 'Laporan Aktivitas';
        $dates = [];
        $dateNames = [];
        $startDate = $request->start_date ?? date('Y-m-d', strtotime('-5 days'));
        $endDate = $request->end_date ?? date('Y-m-d');
        $dateFormat = new IntlDateFormatter('id_ID',  IntlDateFormatter::NONE,
        IntlDateFormatter::NONE, NULL, NULL, "dd MMMM YYYY");
        $period = new DatePeriod(
            new DateTime($startDate),
            new DateInterval('P1D'),
            new DateTime(date('Y-m-d', strtotime($endDate . ' +1 days')))
        );
        $totalActivities = [];
        $totalTimes = [];
        foreach ($period as $value) {
            $date = $value->format('Y-m-d');
            $dateName = datefmt_format($dateFormat, strtotime($date));
            array_push($dates, $date);
            array_push($dateNames, $dateName);
            array_push($totalActivities, 0);
            array_push($totalTimes, 0);
        }
        $activities = UserActivity::with('user')->where(function($q) use($request, $userPermissions)
        {
            if (!in_array('user_activity_fulldata', $userPermissions)) {
                $q->where('user_id', Auth::user()->id);
            }
            if (in_array('user_activity_fulldata', $userPermissions) && $request->user_id != null) {
                $q->where('user_id', $request->user_id);
            }
        })->whereDate('date', '>=', $startDate)->whereDate('date', '<=', $endDate)->get();
        foreach ($activities as $key => $activity) {
            $dateIndex = array_search($activity->date, $dates);
            $totalActivities[$dateIndex] = ($totalActivities[$dateIndex] ?? 0) + 1;
            $totalTimes[$dateIndex] = ($totalTimes[$dateIndex] ?? 0) + $activity->diff_in_hours;
            $activity['date_name'] = $dateNames[$dateIndex];
            $activities[$key] = $activity;
        }

        $data['dates'] = $dates;
        $data['date_names'] = $dateNames;
        $data['activities'] = collect($activities);
        $data['total_activities'] = collect($totalActivities)->values();
        $data['total_times'] = collect($totalTimes)->values();

        return view('dashboard.user-activity.index', $data);
    }

    public function create()
    {
        $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
        if (!in_array('user_activity_create', $userPermissions)) {
            return abort(404);
        }
        $data['title'] = 'Tambah Laporan Aktivitas';
        $data['content_headers'] = [
            (object)[
                'url' => route('dashboard.laporan-aktivitas.index'),
                'name' => 'Laporan Aktivitas'
            ]
        ];
        $isAllowedFullData = Auth::user()->user_permissions->where('permission', 'user_activity_fulldata')->first();
        $data['users'] = User::where(function($q) use($isAllowedFullData)
        {
            if ($isAllowedFullData == null) {
                $q->where('id', Auth::user()->id);
            }
        })->get();

        return view('dashboard.user-activity.create', $data);
    }

    public function store(Request $request)
    {
        $startDate = Carbon::createFromFormat('Y-m-d H:i', $request->date. ' ' .$request->start_time);
        $endDate = Carbon::createFromFormat('Y-m-d H:i', $request->date. ' ' .$request->end_time);
        $diffInHours = $startDate->diffInHours($endDate);
        UserActivity::create([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'diff_in_hours' => $diffInHours,
            'activity' => $request->activity,
            'notes' => $request->notes,
        ]);

        return redirect()->back()->with('OK', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
        if (!in_array('user_activity_update', $userPermissions)) {
            return abort(404);
        }
        $data['title'] = 'Edit Laporan Aktivitas';
        $data['content_headers'] = [
            (object)[
                'url' => route('dashboard.laporan-aktivitas.index'),
                'name' => 'Laporan Aktivitas'
            ]
        ];
        $isAllowedFullData = empty(Auth::user()->user_permissions->where('permission', 'user_activity_fulldata')->first());
        $data['users'] = User::where(function($q) use($isAllowedFullData)
        {
            if (!$isAllowedFullData) {
                $q->where('id', Auth::user()->id);
            }
        })->get();
        $data['activity'] = UserActivity::findOrFail($id);

        return view('dashboard.user-activity.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $startDate = Carbon::createFromFormat('Y-m-d H:i', $request->date. ' ' .$request->start_time);
        $endDate = Carbon::createFromFormat('Y-m-d H:i', $request->date. ' ' .$request->end_time);
        $diffInHours = $startDate->diffInHours($endDate);
        $userActivity = UserActivity::findOrFail($id);
        $userActivity->update([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'diff_in_hours' => $diffInHours,
            'activity' => $request->activity,
            'notes' => $request->notes,
        ]);

        return redirect()->back()->with('OK', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $userActivity = UserActivity::findOrFail($id);
        $userActivity->delete();

        return redirect()->back()->with('OK', 'Data berhasil dihapus');
    }
}
