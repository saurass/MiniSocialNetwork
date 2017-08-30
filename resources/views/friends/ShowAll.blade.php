@extends('layouts.app')

@section('content')
    <div class="col-md-2 col-md-offset-5">
        <div class="panel panel-heading" style="background-color: rgba(80,224,187,0.75)">
            <center><b><u>Friend Requests</u></b></center>
        </div>
    </div><br><br>

        @foreach($req as $b)
            @foreach($all as $v)
                @if($b->from_id == $v->id)
                    <form action="friends/{{ $b->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-default">
                                <div class="panel-heading clearfix">
                                    {{ $v->name }}&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/friends/{{ $v->id }}">View Profile</a>
                                    <input type="submit" class="btn btn-success pull-right" value="Accept">
                                </div>
                            </div>
                        </div>
                    </form>
                    @break
                @endif
            @endforeach
        @endforeach

    <br><br>

    <div class="col-md-2 col-md-offset-5">
        <div class="panel panel-heading" style="background-color: rgba(80,224,187,0.75)">
            <center><b><u>Friends</u></b></center>
        </div>
    </div><br><br>


    @foreach($fri as $b)
        @if($b->status == 1)
            @if($b->from_id == Auth::id())
                @foreach($all as $v)
                    @if($b->to_id == $v->id)
                        <form action="/friends/{{ $b->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-default">
                                    <div class="panel-heading clearfix">
                                        {{ $v->name }}&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/friends/{{ $v->id }}">View Profile</a>
                                        <input type="submit" value="UnFriend" class="btn btn-danger pull-right">
                                    </div>
                                </div>
                            </div>
                        </form>
                        @break
                    @endif
                @endforeach
            @endif
            @if($b->to_id == Auth::id())
                @foreach($all as $v)
                    @if($b->from_id == $v->id)
                        <form action="/friends/{{ $b->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-default">
                                    <div class="panel-heading clearfix">
                                        {{ $v->name }}&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/friends/{{ $v->id }}">View Profile</a>
                                        <input type="submit" value="UnFriend" class="btn btn-danger pull-right">
                                    </div>
                                </div>
                            </div>
                        </form>
                        @break
                    @endif
                @endforeach
            @endif
        @endif
    @endforeach

    <div class="col-md-6 col-md-offset-3">
        <hr style="border: double">
    </div>

        <div class="col-md-6 col-md-offset-3">
            <a href="/friends/create"><center><button class="btn btn-success btn-block">Find Friends</button></center></a>
        </div><br>
@endsection