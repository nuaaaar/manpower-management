<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLocationController extends Controller
{
    public function index()
    {
        $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
        if (!in_array('user_location_read', $userPermissions)) {
            return abort(404);
        }
        $data['title'] = 'Lokasi Petugas';
        $data['petugases'] = User::where('lat', '!=', null)->where('lng', '!=', null)->get();

        return view('dashboard.user-location.index', $data);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'lat' => $request->lat,
            'lng' => $request->lng
        ]);

        return response()->json(['status' => 'OK', 'user' => $user]);
    }
}
