<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data['role'] = Role::all();
        return view('pages.role.index', $data);
    }

    public function create()
    {
        $data['edit'] = [];
        return view('pages.role.create', $data);
    }

    public function edit($id)
    {

        $data['edit'] = Role::find($id);
        return view('pages.role.create', $data);
    }

    public function store(Request $request)
    {
        Role::create([
            'name' => $request->name
        ]);
        return redirect('/admin/role')->with('message', 'data Berhasil di tambahkan');
    }

    public function update(Request $request)
    {
        $data = Role::where([
            ['id', '=', $request->id]
        ])->first();
        $data->update([
            'name' => $request->name
        ]);
        return redirect('/admin/role')->with('message', 'data Berhasil di update');
    }

    public function delete($id)
    {
        Role::destroy($id);
        return redirect('/admin/role')->with('message', 'data Berhasil di hapus');
    }
}