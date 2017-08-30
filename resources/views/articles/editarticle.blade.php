@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Edit Post</b>
                </div>

                <form action="/articles/{{ $msg->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" placeholder="What's in your Mind">{{ $msg->content }}</textarea>
                        </div>

                        <div class="hidden">

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        </div>

                        <select name="privacy" class="btn btn-primary">
                            @if($msg->privacy==0)
                                <option value="0">Public Post</option>
                                <option value="1">Friends Only</option>
                            @else
                                <option value="1">Friends Only</option>
                                <option value="0">Public Post</option>
                            @endif
                        </select>

                        <input type="hidden" name="from_id" value="{{ Auth::user()->id }}"></input>

                        <input type="submit" class="btn btn-success pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection