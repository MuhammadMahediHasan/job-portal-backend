@extends('frontend.layouts.app')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Privacy Policy</h1>
            <div class="row g-4">
                <div class="col-12">
                    {!! $generalSetting->privacy_policy !!}
                </div>
            </div>
        </div>
    </div>
@endsection