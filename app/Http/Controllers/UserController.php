<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search =  $request->input('q');

        if($search!=""){
            $data = User::where(function ($query) use ($search){
                $query->where('username', 'like', '%'.$search.'%')
                    ->orWhere('name', 'like', '%'.$search.'%')
                    ->orderBy('id', 'DESC');
            })
                ->paginate(4);
            $data->appends(['q' => $search]);
        }
        else{
            $data = User::orderBy('id', 'DESC')->paginate(4);
        }

        //return redirect('/usuario')->with('data',$data);
        return view('admin.user.index', compact('data'));//->with('data',$users, 'q',$search);
    }

    public function activar($id)
    {
        $user = User::find($id);
        //dd($user);
        $user->update([
            'activate' => 1
        ]);

        return redirect('/usuario')->with('success', "Account successfully registered.");
    }

    public function desactivar($id)
    {
        $user = User::find($id);
        //dd($user);
        $user->update([
            'activate' => 0
        ]);

        return redirect('/usuario')->with('success', "Account successfully registered.");
    }
}
