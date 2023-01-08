<?php

namespace App\Http\Controllers;

use App\Models\Upt;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Pencarian';
        $data['upts'] = [];
        $data['users'] = [];
        if ($request->search != null)
        {
            $data['upts'] = Upt::where('name', 'LIKE', '%'.$request->search.'%')->orWhere('description', 'LIKE', '%'.$request->search.'%')->get();
            $data['users'] = User::where('name', 'LIKE', '%'.$request->search.'%')->orWhere('email', 'LIKE', '%'.$request->search.'%')->orWhere('phone_number', 'LIKE', '%'.$request->search.'%')->get();
        }

        return view('dashboard.search.index', $data);
    }
}
