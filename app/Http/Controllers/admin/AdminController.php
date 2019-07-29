<?php

namespace App\Http\Controllers\admin;

use App\Donate;
use App\Http\Controllers\Controller;
use App\State;
use Carbon\Carbon;
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
        $this->getCurrnetAmount($donate);
        alert()->success('Success Message', 'donation approved successfully');
        return back();
    }

    public function reject(Donate $donate)
    {
        if ($donate->time($donate) > 1) {
            alert()->error('Error Message', 'u can not rejected this case');
            return back();
        }
        $donate->approval = 0;
        $donate->save();
        alert()->success('Success Message', 'donation rejected successfully');
        return back();
    }

    /**
     * @param Donate $donate
     */
    public function getCurrnetAmount(Donate $donate): void
    {
        $amount = $donate->state->amount;
        $donateamount = $donate->amount;
        $currentamount = $amount - $donateamount;
        $donate->state->current_amount = $currentamount;
        $donate->state->save();
    }


}
