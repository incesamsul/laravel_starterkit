<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
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
        return view('pages.role_menu.role_menu', $data);
    }
}