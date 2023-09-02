@extends('frontend.profile.company.index')
@section('profile-content')
    <div class="card-box">
        <div class="wow fadeInUp" data-wow-delay="0.5s">
            <form action="/company/register" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $profile->id }}"/>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-floating">
                            <input name="name"
                                   value="{{ old('name', $profile->name) }}"
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
                                   value="{{ old('address', $profile->address) }}"
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
                                    <option @selected($key === $profile->type) value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <label for="company-name">Company Type</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12">
                        <div class="form-floating">
                            <input name="description"
                                   value="{{ old('description', $profile->description) }}"
                                   class="form-control"
                                   id="company-name"
                                   placeholder="Company Description"/>
                            <label for="company-name">Company Description</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-floating">
                            <input name="trade_license_no"
                                   value="{{ old('trade_license_no', $profile->trade_license_no) }}"
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
                                   value="{{ old('tin_no', $profile->tin_no) }}"
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
                                   value="{{ old('website', $profile->website) }}"
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
                                   value="{{ old('facebook', $profile->facebook) }}"
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
                                   value="{{ old('linked_in', $profile->linked_in) }}"
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
                                   value="{{ old('youtube', $profile->youtube) }}"
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
                                   value="{{ old('contact_person', $profile->contact_person) }}"
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
                                   value="{{ old('contact_person_designation', $profile->contact_person_designation) }}"
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
                                   value="{{ old('contact_person_phone', $profile->contact_person_phone) }}"
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
                                   value="{{ old('email', $profile->email) }}"
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
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="file" class="form-control" id="profile_image" name="profile_image"
                                   value="{{ old('profile_image', $profile->profile_image ?? '') }}"
                                   placeholder="Resume"/>
                            <label for="profile_image">Profile Image</label>
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
