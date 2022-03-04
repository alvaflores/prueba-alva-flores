<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search =  $request->input('q');

        if($search!=""){
            $data = Article::where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%')
                    ->whereActivate(1)
                    ->orderBy('id', 'DESC');
            })
                ->paginate(10);
            $data->appends(['q' => $search]);
        }
        else{
            $data = Article::whereActivate(1)->orderBy('id', 'DESC')->paginate(10);
        }
        return view('home.index', compact('data'));
    }
}
