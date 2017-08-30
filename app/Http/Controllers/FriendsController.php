<?php

namespace App\Http\Controllers;

use App\friend;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    public function index()
    {
        //
        $req=friend::where('status','=',0)->where('to_id',Auth::id())->latest()->get();
        $fri=friend::where('status','=',1)->where('to_id',Auth::id())->orWhere('from_id',Auth::id())->get();
        return view('friends.ShowAll',compact('req','fri'));
    }

    public function create()
    {
        //
        $friend=friend::where('from_id','=',Auth::id())->orWhere('to_id','=',Auth::id())->get();
        $suggestion=User::where('id','!=',Auth::id())->paginate(10);
        //return $friend;
        return view('friends.FindFriend',compact('friend','suggestion'));
    }

    public function store(Request $request)
    {
        //
        friend::create($request->all());
        return redirect('/friends/create');
    }

    public function show($id)
    {
        //
        $info=User::where('id',$id)->first();
        return view('friends.ShowProfile',compact('info','id'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
        friend::where('id',$id)->update(['status' => 1]);
        return redirect('/friends');
    }

    public function destroy($id)
    {
        //
        friend::where('id',$id)->delete();
        return redirect('/friends');
    }
}
