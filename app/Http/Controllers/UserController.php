<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class UserController extends Controller
{
    public function index()
    {
        // return view('users/index');
        $items = Employee::where('id', '>', 0)->get();
    	return view('users/index', compact('items'));
    }

    public function user_store(Request $request)
    {
        $new_user = new Employee();
        $new_user->fname = $request['fullname'];
        $new_user->age = $request['age'];
        $new_user->save();

        return redirect()->back()->with('success', 'Added successfully');
    }

    public function user_edit($user_id)
    {
        $user_data = Employee::find($user_id);
        if($user_data){
            return view('users/detail', compact('user_data'));
        }
    }

    public function user_destroy($user_id)
    {
        $user_ = Employee::find($user_id);
        if($user_){
            $user_->delete();
        }

        return redirect()->back()->with('success', 'Deleted successfully');
    }

    public function user_update(Request $req, $user_id)
    {
        Employee::where('id', $user_id)->update(['fname'=> $req['fullname-edit'], 'age' => $req['age-edit']]);
        return redirect()->back()->with('success-edit', 'Updated successfully');
    }
}
