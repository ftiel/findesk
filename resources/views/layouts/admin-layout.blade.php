@extends('layouts.main-layout')

@section('content')
    <div class="admin-panel">
        @include('partial.side-nav')
        @yield('admin-content')
    </div>
@endsection