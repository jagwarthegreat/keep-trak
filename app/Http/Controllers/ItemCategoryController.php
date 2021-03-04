<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemCategory;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat_data = ItemCategory::where('id', '>', 0)->orderBy('id', 'DESC')->paginate(15);
        return view('itemCategories/index', compact('cat_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_name' => 'required'
        ]);

        $new_cat = new ItemCategory();
        $new_cat->name = $request->cat_name;
        $new_cat->save();

        return redirect()->back()->with('item-category', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat_data = ItemCategory::find($id);
        if ($cat_data) {
            return view('itemCategories/detail', compact('cat_data'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ItemCategory::where('id', $id)->update(['name' => $request['loc-name-edit']]);
        return redirect()->back()->with('item-category', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catData = ItemCategory::find($id);
        if ($catData) {
            $catData->delete();
        }

        return redirect()->back()->with('item-category', 'Category deleted successfully');
    }
}
