@extends('frontend.layouts.app')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Login </h1>
            <div class="row g-4">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <form
                            @if(request()->segment(1) === 'company')
                                action="/company/login"
                            @else
                                action="/job-seeker/login"
                            @endif
                            method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Your Email"/>
                                        <label for="email">Your Email</label>
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="Your Password"/>
                                        <label for="password">Your Password</label>
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
