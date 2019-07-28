<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\State;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $cases = State::with('charity')->get();

        return view('admin.admin.index', compact('cases'));
    }

    public function destroy(State $case)
    {
        $case->delete();
        alert()->success('Success Message', 'deleted successfully');

        return back();
    }
}
