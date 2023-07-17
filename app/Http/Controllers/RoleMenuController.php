<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use App\Models\RoleMenu;
use Illuminate\Http\Request;

class RoleMenuController extends Controller
{
    public function index()
    {
        $data['role'] = Role::all();
        return view('pages.role_menu.index', $data);
    }

    public function role_menu($idRole = null)
    {
        $data['menu'] = Menu::all();
        $data['role_id'] = $idRole;
        $data['role_menu'] = RoleMenu::where('role_id', $idRole)->get();
        return view('pages.role_menu.role_menu', $data);
    }

    public function store(Request $request)
    {
        foreach ($request->menu_id as $row) {
            RoleMenu::create([
                'role_id' => $request->role_id,
                'menu_id' => $row
            ]);
        }

        return response()->json([
            'message' => 'data successfully stored'
        ]);
    }
}