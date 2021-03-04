<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\ItemCategory;
use App\Models\Location;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_data = Items::where('id', '>', 0)->get();
        $cat_data = ItemCategory::where('id', '>', 0)->get();
        $loc_data = Location::where('id', '>', 0)->get();
        return view('items/index', compact('item_data', 'cat_data', 'loc_data'));
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
        if ($request['item_name'] != "" || $request['item_category']) {
            $new_item = new Items();
            $new_item->serial = $request['item_serial'];
            $new_item->name = $request['item_name'];
            $new_item->description = $request['item_description'];
            $new_item->user_id = 1;
            $new_item->location_id = $request['item_loc'];
            $new_item->category_id = $request['item_category'];
            $new_item->save();

            return redirect()->back()->with('item', 'Item added successfully');
        } else {
            return redirect()->back()->with('item', 'Field is blank, please check!');
        }
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
        $item_data = Items::find($id);
        if ($item_data) {
            return view('items/detail', compact('item_data'));
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
        Items::where('id', $id)->update(['name' => $request['loc-name-edit']]);
        return redirect()->back()->with('item', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemData = Items::find($id);
        if ($itemData) {
            $itemData->delete();
        }

        return redirect()->back()->with('item', 'Item deleted successfully');
    }
}
