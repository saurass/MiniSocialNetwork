<?php

namespace App\Http\Controllers;

use App\article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        //
        $users=Auth::user()->all();
        $AllMsg=article::where('privacy','0')->latest()->paginate(10);
        return view('articles.showall',compact('AllMsg','users'));
    }

    public function create()
    {
        //
        return view('articles.createmessage');
    }

    public function store(Request $request)
    {
        //
        article::create($request->all());
        return redirect('/articles');
    }

    public function show($id)
    {
        //
        $users=Auth::user()->all();
        $msg=article::where('id',$id)->first();
        return view('articles.showmessage',compact('msg','users'));
    }

    public function edit($id)
    {
        //
        $msg=article::where('id',$id)->first();
        return view('articles.editarticle',compact('msg'));
    }

    public function update(Request $request, $id)
    {
        //
        article::where('id',$id)->update(['content' => $request->content ,'privacy' => $request->privacy]);
        return redirect('/articles');
    }

    public function destroy($id)
    {
        //
        article::where('id',$id)->delete();
        return redirect('/articles');
    }

    public function like($id)
    {
        $likes=article::where('id',$id)->first();
        $newLikes=$likes->likes +1;
        article::where('id',$id)->update(['likes'=> $newLikes]);
        return redirect('/articles');
    }
}
