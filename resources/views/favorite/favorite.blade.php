@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-8">
            @include('users.users', ['users' => $users])
        </div>
    </div>
@endsection