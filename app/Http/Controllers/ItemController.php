<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\ItemCategory;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_data = Items::where('id', '>', 0)->orderBy('id', 'DESC')->paginate(15);
        $cat_data = ItemCategory::where('id', '>', 0)->orderBy('name', 'ASC')->get();
        $loc_data = Location::where('id', '>', 0)->orderBy('name', 'ASC')->get();
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
        $request->validate([
            'item_name' => 'required',
            'item_loc' => 'required',
            'item_category' => 'required'
        ]);

        $new_item = new Items();
        $new_item->serial = $request->item_serial;
        $new_item->name = $request->item_name;
        $new_item->description = $request->item_description;
        $new_item->user_id = Auth::user()->id;
        $new_item->location_id = $request->item_loc;
        $new_item->category_id = $request->item_category;
        $new_item->save();

        return redirect()->back()->with('item', 'Item added successfully');
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
            $cat_data = ItemCategory::where('id', '>', 0)->orderBy('name', 'ASC')->get();
            $loc_data = Location::where('id', '>', 0)->orderBy('name', 'ASC')->get();
            return view('items/detail', compact('item_data', 'cat_data', 'loc_data'));
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
        $data = [
            'name' => $request['edit_item_name'],
            'serial' => $request['edit_item_serial'],
            'category_id' => $request['edit_item_category'],
            'location_id' => $request['edit_item_loc'],
            'description' => $request['edit_item_description']
        ];

        Items::where('id', $id)->update($data);
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

    public function history($id)
    {
        $item_history_data = Items::find($id);
        if ($item_history_data) {
            $transferHistory = []; //Location::where('id', '>', 0)->orderBy('name', 'ASC')->get();
            return view('items/history', compact('item_history_data', 'transferHistory'));
        }
    }
}
