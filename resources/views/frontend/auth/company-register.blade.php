@extends('frontend.layouts.app')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Register </h1>
            <div class="row g-4">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <form action="/company/register" method="POST">
                            @csrf
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input name="name"
                                               value="{{ old('name') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-name"
                                               placeholder="Company Name"/>
                                        <label for="company-name">Company Name</label>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input name="address"
                                               value="{{ old('address') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-location"
                                               placeholder="Your Email"/>
                                        <label for="company-location">Company Location</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-control"
                                                name="type"
                                                id="company-name"
                                                placeholder="Company Type">
                                            <option>Select</option>
                                            @foreach($jobTypes as $key => $value)
                                            <option @selected($key === old('type')) value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <label for="company-name">Company Type</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-floating">
                                                <textarea name="description"
                                                          value="{{ old('description') }}"
                                                          class="form-control"
                                                          id="company-name"
                                                          placeholder="Company Description">
                                                </textarea>
                                        <label for="company-name">Company Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input name="trade_license_no"
                                               value="{{ old('trade_license_no') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-name"
                                               placeholder="Business/ Trade License No"/>
                                        <label for="company-name">Business/ Trade License No</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input name="tin_no"
                                               value="{{ old('tin_no') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-name"
                                               placeholder="Business BIN/ TIN No"/>
                                        <label for="company-name">Business BIN/ TIN No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text"
                                               class="form-control"
                                               id="company-name"
                                               placeholder="RL No (Only for Recruiting Agency)"/>
                                        <label for="company-name">RL No (Only for Recruiting Agency)</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input name="website"
                                               value="{{ old('website') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-name"
                                               placeholder="Company's Website"/>
                                        <label for="company-name">Company's Website</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="facebook"
                                               value="{{ old('facebook') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-name"
                                               placeholder="Company's facebook profile"/>
                                        <label for="company-name">Company's facebook profile</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="linked_in"
                                               value="{{ old('linked_in') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-name"
                                               placeholder="Company's linkedin profile"/>
                                        <label for="company-name">Company's linkedin profile</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="youtube"
                                               value="{{ old('youtube') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-name"
                                               placeholder="Company's youtube channel"/>
                                        <label for="company-name">Company's youtube channel</label>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input name="contact_person"
                                               value="{{ old('contact_person') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-name"
                                               placeholder="Contact person’s Name"/>
                                        <label for="company-name">Contact person’s Name</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input name="contact_person_designation"
                                               value="{{ old('contact_person_designation') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-name"
                                               placeholder="Contact person’s Designation"/>
                                        <label for="company-name">Contact person’s Designation</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input name="contact_person_phone"
                                               value="{{ old('contact_person_phone') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-name"
                                               placeholder="Contact person’s Phone"/>
                                        <label for="company-name">Contact person’s Phone</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input name="email"
                                               value="{{ old('email') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-name"
                                               placeholder="Email Address"/>
                                        <label for="company-name">Email Address</label>
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input name="password"
                                               value="{{ old('password') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-name"
                                               placeholder="Password"/>
                                        <label for="company-name">Password</label>
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input name="password_confirmation"
                                               value="{{ old('password_confirmation') }}"
                                               type="text"
                                               class="form-control"
                                               id="company-name"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
