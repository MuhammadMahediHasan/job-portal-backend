@extends('frontend.layouts.app')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Help</h1>
            <div class="row g-4">
                <div class="col-12">
                    {!! $generalSetting->help !!}
                </div>
            </div>
        </div>
    </div>
@endsection
