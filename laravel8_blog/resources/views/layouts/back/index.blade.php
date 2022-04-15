@extends('layouts.back.core.main')

@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back {{ Auth::user()->name }}</h1>
    </div>
@endsection
