<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\AddCaseRequest;
use App\state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharityController extends Controller
{
    public function index()
    {
        return view('admin.charity.index');
    }


    public function store(AddCaseRequest $request)
    {
        State::create([
            'amount' => $request->amount,
            'description' => $request->description,
            'admin_id' => Auth::guard('admins')->id()
        ]);

        alert()->success('Success Message', 'created successfully');

        $adminId = Auth::guard('admins')->id();
        return redirect()->route('admin.charity.all.dashboard', $adminId);
    }

    public function showAll(Admin $charity)
    {
        $cases = $charity->states()->latest()->get();
        return view('admin.charity.allCases', compact('cases'));
    }

    public function destroy(State $case)
    {
        $case->delete();
        alert()->success('Success Message', 'deleted successfully');

        return back();
    }

    public function updateview(State $case)
    {

        return view('admin.charity.edit', compact('case'));
    }

    public function update(AddCaseRequest $request, State $case)
    {
        $case->update([
            'amount' => $request->amount,
            'description' => $request->description,
        ]);
        alert()->success('Success Message', 'updated successfully');

        $adminId = Auth::guard('admins')->id();
        return redirect()->route('admin.charity.all.dashboard', $adminId);
    }
}
