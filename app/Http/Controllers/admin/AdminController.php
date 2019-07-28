<?php

namespace App\Http\Controllers\admin;

use App\Donate;
use App\Http\Controllers\Controller;
use App\State;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $cases = State::get();

        return view('admin.admin.index', compact('cases'));
    }

    public function destroy(State $case)
    {
        $case->delete();
        alert()->success('Success Message', 'deleted successfully');

        return back();
    }

    public function approval(Donate $donates)
    {
        $donates = $donates->get();
        return view('admin.admin.casesApproval', compact('donates'));
    }

    public function approve(Donate $donate, State $state)
    {
        $donate->approval = 1;
        $donate->save();
        $amount = $donate->state->amount;
        $donateamount = $donate->amount;
        $currentamount = $amount - $donateamount;
        $donate->state->current_amount = $currentamount;
        $donate->state->save();
        alert()->success('Success Message', 'donation approved successfully');
        return back();
    }

    public function reject(Donate $donate)
    {
        $donate->approval = 0;
        $donate->save();
        alert()->success('Success Message', 'donation rejected successfully');
        return back();
    }


}
