<?php

namespace App\Http\Controllers;

use App\Models\Upt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UptController extends Controller
{
    public function index(Request $request)
    {
        $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
        if (!in_array('upt_read', $userPermissions)) {
            return abort(404);
        }
        $data['title'] = 'UPT';
        $data['upts'] = Upt::where('name', 'LIKE', '%'.$request->search.'%')->orWhere('description', 'LIKE', '%'.$request->search.'%')->orderBy('name')->get();

        return view('dashboard.upt.index', $data);
    }

    public function create()
    {
        $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
        if (!in_array('upt_create', $userPermissions)) {
            return abort(404);
        }
        $data['title'] = 'Tambah UPT';
        $data['content_headers'] = [
            (object)[
                'url' => route('dashboard.upt.index'),
                'name' => 'UPT'
            ]
        ];
        return view('dashboard.upt.create', $data);
    }

    public function store(Request $request)
    {
        $img = $this->storeFile($request);
        Upt::create([
            'name' => $request->name,
            'description' => $request->description,
            'img_organizational_structure' => $img
        ]);

        return redirect()->back()->with('OK', 'Data berhasil ditambah');
    }

    public function show($id)
    {
        $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
        if (!in_array('upt_read', $userPermissions)) {
            return abort(404);
        }
        $data['upt'] = Upt::findOrFail($id);
        $data['title'] = 'Detail UPT';

        return view('dashboard.upt.show', $data);
    }

    public function edit($id)
    {
        $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
        if (!in_array('upt_update', $userPermissions)) {
            return abort(404);
        }
        $data['title'] = 'Edit UPT';
        $data['content_headers'] = [
            (object)[
                'url' => route('dashboard.upt.index'),
                'name' => 'UPT'
            ]
        ];
        $data['upt'] =  Upt::findOrFail($id);
        return view('dashboard.upt.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $upt =  Upt::findOrFail($id);

        $img = $this->storeFile($request) ?? $upt->img_organizational_structure;
        $upt->update([
            'name' => $request->name,
            'description' => $request->description,
            'img_organizational_structure' => $img
        ]);

        return redirect()->back()->with('OK', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $upt =  Upt::findOrFail($id);
        $upt->delete();

        return redirect()->back()->with('OK', 'Data berhasil dihapus');
    }

    public function storeFile(Request $request)
    {
        if(!$request->hasFile('file'))
        {
            return null;
        }

        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads/upt', $fileName, 'public');

        return '/storage/' . $filePath;
    }
}
