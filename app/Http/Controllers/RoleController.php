<?php

namespace App\Http\Controllers;

use App\Models\Method;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function list()
    {
        return view('admin.roles.list')->with([
            'objects' => Role::get(),
            'methods' => Method::get(),
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
        $r = Role::find($id);
        $a = new AccessController();
        $r->access = $a->get_by_role_id($r->id);
        return $r;
    }

    public function edit(Request $r)
    {
        return Role::find($r->id)->update([
            'name' => $r->name,
            'fa_name' => $r->fa_name
        ]);
    }

    public function edit_role_access(Request $r)
    {
        
    }
}
