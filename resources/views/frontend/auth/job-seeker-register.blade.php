@extends('frontend.layouts.app')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Register </h1>
            <div class="row g-4">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <form>
                            <form>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="company-name"
                                                   placeholder="Full Name"/>
                                            <label for="company-name">Full Name</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="company-location"
                                                   placeholder="Your Email"/>
                                            <label for="company-location">Company Location</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="company-location"
                                                   placeholder="Your Email"/>
                                            <label for="company-location">Date of birth</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <select class="form-control" id="company-name"
                                                    placeholder="Country">
                                                <option>Select</option>
                                            </select>
                                            <label for="company-name">Country</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="company-name"
                                                   placeholder="Contact person’s Phone"/>
                                            <label for="company-name">Contact person’s Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="company-name"
                                                   placeholder="Email Address"/>
                                            <label for="company-name">Email Address</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="company-name"
                                                   placeholder="Password"/>
                                            <label for="company-name">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="company-name"
                                                   placeholder="Retype Password"/>
                                            <label for="company-name">Retype Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
