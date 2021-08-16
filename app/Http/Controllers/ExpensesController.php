<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{


    public function index()
    {
        return  Expense::with('category:id,name,icon_type,color,class_or_path')
                ->orderBy('date', 'desc')
                ->orderBy('id', 'desc')
                // ->get();
                ->paginate(10);
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


    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
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
