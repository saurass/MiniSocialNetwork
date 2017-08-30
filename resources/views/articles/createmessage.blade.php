@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Create Post</b>
                </div>

                <form action="/articles" method="post">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" placeholder="What's in your Mind"></textarea>
                        </div>

                        <div class="hidden">

                            <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                        </div>

                        <select name="privacy" class="btn btn-primary">
                            <option value="0">Public Post</option>
                            <option value="1">Friends Only</option>
                        </select>

                        <input type="hidden" name="from_id" value="{{ Auth::user()->id }}"></input>

                        <input type="submit" class="btn btn-success pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection