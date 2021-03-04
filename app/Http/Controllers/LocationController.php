<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loc_data = Location::where('id', '>', 0)->orderBy('id', 'DESC')->paginate(15);
        return view('locations/index', compact('loc_data'));
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
            'loc_name' => 'required'
        ]);

        $new_loc = new Location();
        $new_loc->name = $request->loc_name;
        $new_loc->save();

        return redirect()->back()->with('location', 'Location added successfully');
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
        $loc_data = Location::find($id);
        if ($loc_data) {
            return view('locations/detail', compact('loc_data'));
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
        Location::where('id', $id)->update(['name' => $request['loc-name-edit']]);
        return redirect()->back()->with('location', 'Location updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locData = Location::find($id);
        if ($locData) {
            $locData->delete();
        }

        return redirect()->back()->with('location', 'Location deleted successfully');
    }
}
