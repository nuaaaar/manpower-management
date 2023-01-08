<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserActivity;
use App\Models\UserPermission;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use IntlDateFormatter;

class UserController extends Controller
{
    public function index()
    {
        $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
        if (!in_array('user_read', $userPermissions)) {
            return abort(404);
        }
        $data['title'] = 'Petugas';
        $data['roles'] = Role::with('users')->get();

        return view('dashboard.user.index', $data);
    }

    public function create()
    {
        $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
        if (!in_array('user_create', $userPermissions)) {
            return abort(404);
        }
        $data['title'] = 'Tambah Petugas';
        $data['content_headers'] = [
            (object)[
                'url' => route('dashboard.petugas.index'),
                'name' => 'Petugas'
            ]
        ];
        $data['roles'] = Role::all();

        return view('dashboard.user.create', $data);
    }

    public function store(Request $request)
    {
        $existingEmail = User::where('email', $request->email)->first();
        if ($existingEmail != null)
        {
            return redirect()->back()->with('ERR', 'Email tidak dapat digunakan');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'status' => $request->status
        ]);

        if (isset($request->permissions))
        {
            $permissions = [];
            foreach ($request->permissions as $permission)
            {
                $permission = [
                    'user_id' => $user->id,
                    'permission' => $permission,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                array_push($permissions, $permission);
            }

            UserPermission::insert($permissions);
        }

        return redirect()->back()->with('OK', 'Data berhasil ditambah');
    }

    public function show(Request $request, $id)
    {
        $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
        if (!in_array('upt_read', $userPermissions)) {
            return abort(404);
        }
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
        $activities = UserActivity::with('user')->where('user_id', $id)->whereDate('date', '>=', $startDate)->whereDate('date', '<=', $endDate)->get();
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

        $data['user'] = User::findOrFail($id);
        $data['title'] = 'Detail Petugas';

        return view('dashboard.user.show', $data);
    }

    public function edit($id)
    {
        $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
        if (!in_array('user_update', $userPermissions)) {
            return abort(404);
        }
        $data['title'] = 'Edit Petugas';
        $data['content_headers'] = [
            (object)[
                'url' => route('dashboard.petugas.index'),
                'name' => 'Petugas'
            ]
        ];
        $data['roles'] = Role::all();
        $data['user'] = User::with('user_permissions')->findOrFail($id);

        return view('dashboard.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $existingEmail = User::where('email', $request->email)->first();
        if ($existingEmail != null)
        {
            if ($user->id != $existingEmail->id)
            {
                return redirect()->back()->with('ERR', 'Email tidak dapat digunakan');
            }
        }
        $password = $request->password != null && $request->password != '' ? bcrypt($request->password) : $user->password;
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $password,
            'role_id' => $request->role_id,
            'status' => $request->status
        ]);

        UserPermission::where('user_id', $user->id)->delete();
        if (isset($request->permissions))
        {
            $permissions = [];
            foreach ($request->permissions as $permission)
            {
                $permission = [
                    'user_id' => $user->id,
                    'permission' => $permission,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                array_push($permissions, $permission);
            }

            UserPermission::insert($permissions);
        }

        return redirect()->back()->with('OK', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('OK', 'Data berhasil dihapus');
    }
}
