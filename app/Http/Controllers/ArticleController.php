<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $search =  $request->input('buscarArriculo');
        //dd($search);

        if($search!=""){
            $data = Article::where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%')
                    ->orderBy('id', 'DESC');
            })
                ->paginate(10);
            $data->appends(['buscarArriculo' => $search]);
        }
        else{
            $data = Article::orderBy('id', 'DESC')->paginate(10);
        }

        //return redirect('/usuario')->with('data',$data);
        return view('admin.article.index', compact('data'));//->with('data',$users, 'q',$search);
    }

    public function create(){
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        Article::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'activate' => 1,
            'user_id'=>Auth::user()->id,
        ]);

        return redirect("/articulo");
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.article.update', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        //dd($request);
        $user = Article::find($id);
        $user->update([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
        ]);

        return redirect('/articulo')->with('success', "Account successfully registered.");
    }

    public function activar($id)
    {
        $user = Article::find($id);
        $user->update([
            'activate' => 1
        ]);

        return redirect('/articulo')->with('success', "Account successfully registered.");
    }

    public function desactivar($id)
    {
        $user = Article::find($id);
        $user->update([
            'activate' => 0
        ]);

        return redirect('/articulo')->with('success', "Account successfully registered.");
    }

    public function delete ($id){
        $article = Article::find($id);
        $article->delete();
        return redirect('/articulo');
    }
}
