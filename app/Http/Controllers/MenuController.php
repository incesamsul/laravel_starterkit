<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $data['menu'] = Menu::all();
        return view('pages.menu.index', $data);
    }

    public function create()
    {
        $data['edit'] = [];
        return view('pages.menu.create', $data);
    }

    public function edit($id)
    {

        $data['edit'] = Menu::find($id);
        return view('pages.menu.create', $data);
    }

    public function store(Request $request)
    {
        Menu::create([
            'name' => $request->name
        ]);
        return redirect('/admin/menu')->with('message', 'data Berhasil di tambahkan');
    }

    public function update(Request $request)
    {
        $data = Menu::where([
            ['id', '=', $request->id]
        ])->first();
        $data->update([
            'name' => $request->name
        ]);
        return redirect('/admin/menu')->with('message', 'data Berhasil di update');
    }

    public function delete($id)
    {
        Menu::destroy($id);
        return redirect('/admin/menu')->with('message', 'data Berhasil di hapus');
    }
}