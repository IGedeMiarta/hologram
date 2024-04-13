<?php

namespace App\Http\Controllers;

use App\Cost;
use App\CostType;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function index(){
        $data['title'] = 'Pengeluaran';
        $data['table'] = Cost::orderByDesc('id')->get();
        $data['type'] = CostType::all();

        // Get the current month's start and end dates
        [$thisMonthStart, $thisMonthEnd] = getMonthStartEndDates(0);
        // Get the last month's start and end dates
        [$lastMonthStart, $lastMonthEnd] = getMonthStartEndDates(1);
        $data['this_month'] = Cost::whereBetween('created_at', [$thisMonthStart, $thisMonthEnd])->sum('amount');
        // Sum of amounts for last month
        $data['last_month'] = Cost::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->sum('amount');
        $lastMonthCost = $data['last_month'];
        $thisMonthCost = $data['this_month'];
        if ($lastMonthCost != 0) {
            $percentIncrease = (($thisMonthCost - $lastMonthCost) / $lastMonthCost) * 100;
        } else {
            // If last month's cost is 0, handle division by zero
            $percentIncrease = ($thisMonthCost != 0) ? 100 : 0;
        }
        $data['percent'] = $percentIncrease;
        return view('admin.cost',$data);
    }
    public function post(Request $request){
        $cost = new Cost();
        $cost->name = $request->name;
        $cost->amount = getAmount($request->amount);
        $cost->flag = $request->type;
        $cost->notes = $request->notes;
        $cost->save();
        return redirect()->back()->with('success','Pengeluaran Baru Ditambahkan');

    }
    public function update(Request $request,$id){
        $cost = Cost::find($id);
        $cost->name = $request->name;
        $cost->amount = getAmount($request->amount);
        $cost->flag = $request->type;
        $cost->notes = $request->notes;
        $cost->save();
        return redirect()->back()->with('success','Pengeluaran Baru Ditambahkan');
    }
}
