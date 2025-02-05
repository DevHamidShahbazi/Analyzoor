@extends('layouts.layout public.index')
@section('title'){{setting_with_key('title')->value}} @parent @endsection
@section('description'){{setting_with_key('description')->value}}@endsection
@section('keywords'){{setting_with_key('keywords')->value}}@endsection
@section('content')




    <div class="col-12">
        <div class="bg-section-1-home" >
            <div class="row m-0 justify-content-center">
                <a target="_blank" href="https://instagram.com/fanoram_ir" class="col-md-8 col-sm-10 col-12">
                    <img class="col-12" src="./public/img/obj/instagram.jpg" alt="فانورام">
                </a>
            </div>
        </div>
    </div>

@endsection
