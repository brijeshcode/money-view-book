<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ExpensesController extends Controller
{


    public function index()
    {
        return  Expense::with('category:id,name,icon_type,color,class_or_path')
                ->orderBy('date', 'desc')
                ->orderBy('id', 'desc')
                // ->get();
                ->paginate(20);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
                'transaction_title' => 'required',
                'date' => 'required',
                'amount' => 'required',
                'category_id' => 'required',
            ],
            [
                'transaction_title.required' => 'Title is empty.',
                'date.required' => 'Date is empty.',
                'amount.required' => 'Amount is empty.',
                'category_id.required' => 'Category not selected.',
            ]
        );

        $expense = Expense::create($request->all());
        return $expense;
    }

    public function expenseTotal()
    {
        $month = date('m');
        $year = date('Y');
        return Expense::whereMonth('date', $month)->whereYear('date', $year)->sum('amount');
        // return  Expense::whereMonth('date', $month)->get();
    }


    public function expenseReport()
    {
        $year = date('Y');
        $month = date('m');
        $total = $this->expenseTotal();
        $expenseReport = Expense::with('category:id,name,class_or_path,color,icon_type')
                    ->whereMonth('date', $month)
                    ->whereYear('date', $year)
                    ->select('category_id' , DB::raw("sum(amount) as amount , CONCAT(round((sum(amount) / $total) * 100, 2), ' %') percent_string,   round((sum(amount) / $total) * 100, 2) as percent "))
                    ->groupBy('category_id')
                    ->orderBy('percent' , 'desc')
                    ->get();
        return $expenseReport;
    }

    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
