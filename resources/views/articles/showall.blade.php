@extends('layouts.app')

@section('content')
    @foreach($AllMsg as $msg)
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Posted By :</b>
                    @if($msg->from_id == Auth::user()->id)
                        <u>You</u>
                    @else
                        @foreach($users as $user)
                            @if($user->id == $msg->from_id)
                                <u>{{ $user->name }}</u>
                                @break
                            @endif
                        @endforeach
                    @endif
                    @if( $msg->privacy==0 )
                        &nbsp;&nbsp;(Public Post)
                    @endif
                    <span class="pull-right">
                        @if($msg->from_id == Auth::user()->id)
                            <a href="/articles/{{ $msg->id }}/edit">Edit</a>&nbsp;&nbsp;|
                        @endif
                        {{ $msg->created_at->diffForHumans() }}
                    </span>
                </div>
                <div class="panel-body">
                    {{ substr($msg->content,0,random_int(400,800)) }}<b>.....</b>
                    <a href="/articles/{{ $msg->id }}">Read more</a>
                </div>
                <div class="panel-footer clearfix">
                    {{ $msg->likes }} likes
                    <form action="/like/{{ $msg->id }}">
                        {{ csrf_field() }}
                        <input type="submit" name="like" value="Like" class="btn btn-primary pull-left">
                    </form>
                    @if(Auth::user()->id == $msg->from_id)
                        <form action="/articles/{{ $msg->id }}" method="post">
                            {{ csrf_field() }}.
                            {{ method_field('DELETE') }}
                            <input type="submit" name="delete" value="Delete" class="btn btn-danger pull-right">
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    <center>{{ $AllMsg->links() }}</center>
@endsection