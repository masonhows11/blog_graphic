<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreativeController extends Controller
{
    //

    public function index()
    {
        return view('admin.creative_management.index');
    }

    public function create()
    {
        return view('admin.creative_management.create');
    }


    public function store(Request $request)
    {

    }

    public function edit()
    {

    }

    public function update(Request $request)
    {

    }

    public function changeStatus()
    {

    }

    public function delete()
    {

    }
}
