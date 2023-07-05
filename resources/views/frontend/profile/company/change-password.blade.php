@extends('frontend.profile.company.index')
@section('profile-content')
    <div class="card-box">
        <div class="wow fadeInUp" data-wow-delay="0.5s">

            <form action="/company/profile/change-password" method="POST">
                @csrf
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                   value="{{ old('current_password') }}"
                                   placeholder="Password"/>
                            <label for="current_password">Current Password</label>
                        </div>
                        <small class="text-danger">{{ $errors->first('current_password') }}</small>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" name="password"
                                   value="{{ old('password') }}"
                                   placeholder="Password"/>
                            <label for="password">New Password</label>
                        </div>
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation" value="{{ old('password_confirmation') }}"
                                   placeholder="Retype Password"/>
                            <label for="password_confirmation">Retype Password</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
