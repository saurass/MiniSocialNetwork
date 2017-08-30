@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-heading" style="background-color: rgba(80,224,187,0.75)">
            <center>Find Friends</center>
        </div>
    </div><br><br>

    @foreach($suggestion as $b)
        @foreach($friend as $v)
            @if($b->id != $v->from_id and $b->id != $v->to_id)
                <p hidden>{{ $flag = '1' }}</p>
            @else
                <p hidden>{{ $flag = '0' }}</p>
                @break
            @endif
        @endforeach

        @if($flag == 1)
            <form action="/friends" method="post">
                {{ csrf_field() }}
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            {{ $b->name }}&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/friends/{{ $b->id }}">View Profile</a>
                            <input type="submit" value="Send Request" class="btn btn-primary pull-right">
                            <input type="hidden" value="{{ $b->id }}" name="to_id">
                            <input type="hidden" value="{{ Auth::id() }}" name="from_id">
                        </div>
                    </div>
                </div>
            </form>
        @endif

    @endforeach
    <center>{{ $suggestion->links() }}</center>
@endsection