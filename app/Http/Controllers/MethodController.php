<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Method;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    private $model;

    public function __construct() {
        $this->model = new Method();
    }

    public function add(Request $r)
    {
        $this->model->name = $r->name;
        $this->model->fa_name = $r->fa_name;
        $this->model->save();
        return true;
    }

    public function list()
    {
        return view('admin.methods.list')->with([
            'objects' => $this->model->get(),
        ]);
    }
}
