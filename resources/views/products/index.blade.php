@extends('Layout.master')

@section('content')
@if(session('success'))
    <div class="alert alert-success mx-auto" style="width: 80%;">
        {{ session('success') }}
    </div>
@endif

<div id="app">
    <router-view></router-view>
</div>
@endsection
