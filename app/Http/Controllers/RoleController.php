<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function list()
    {
        return view('admin.roles.list')->with([
            'objects' => Role::get(),
        ]);
    }

    public function get_user_role_list()
    {
        return Role::get();
    }

    public function add(Request $r)
    {
        $r = Role::create([
            'name' => $r->name,
            'fa_name' => $r->fa_name
        ]);
        return $r;
    }

    public function get($id)
    {
        return Role::find($id);
    }

    public function edit(Request $r)
    {
        return Role::find($r->id)->update([
            'name' => $r->name,
            'fa_name' => $r->fa_name
        ]);
    }
}
