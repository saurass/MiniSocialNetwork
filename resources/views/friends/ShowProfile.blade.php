@extends('layouts.app')

@section('content')
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h4>View Profile</h4></center></div>
                <div class="panel-body">
                    <h4><u><b>Name</b></u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $info->name }}</h4>
                    <h4><u><b>UserName</b></u> : {{ $info->username }}</h4>
                    <h4><u><b>Email</b></u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $info->email }}</h4>
                </div>
            </div>
        </div>
@endsection