@extends('layouts.layout public.index')
@section('title'){{setting_with_key('title')->value}} @parent @endsection
@section('description'){{setting_with_key('description')->value}}@endsection
@section('keywords'){{setting_with_key('keywords')->value}}@endsection
@section('content')
    @include('components.public-update-password.index')
    <section>
        <div class="container py-5" dir="rtl">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <a href="{{route('user-panel.dashboard')}}">
                                <img src="{{auth()->user()->image}}" alt="{{auth()->user()->name}}"
                                     class="rounded-circle img-fluid" style="width: 150px;">
                            </a>
                            <h5 class="my-3">{{auth()->user()->name}}</h5>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updatePassword" type="button"
                                   data-mdb-ripple-init class="btn btn-outline-light mx-1">تغییر رمز</a>
                            </div>
                        </div>
                    </div>
                    @include('layouts.layout user-panel.sidebar')
                </div>
                <div class="col-lg-8">
                    @section('page')@show
                </div>
            </div>
        </div>
    </section>
@endsection
