<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategortiesController extends Controller
{
    public function index()
    {
        return  Category::orderBy('name')->get();

    }

    public function expense($value='')
    {
        return $expenses = Category::where('type', 'expense')
                    ->orderBy('name', 'asc')->get();
    }

    public function latestUsed()
    {
        return Category::where('type', 'expense')->orderBy('name', 'asc')->limit(12)->get();
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories',
            'color' => 'required',
            'type' => 'required',
            'class_or_path' => 'required',
            'icon_type' => 'required'
        ]);

        $category = Category::create($request->all());

        return $category;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }



}
