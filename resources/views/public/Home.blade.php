@extends('layouts.layout public.index')
@section('content')
    <h1>Home</h1>
    <h2>welcome</h2>

    @auth()
        <a style="text-align: right;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           href="{{ route('logout') }}" class="nav-link ">
            <i class="fa fa-power-off"></i>خروج
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    @endauth
@endsection
