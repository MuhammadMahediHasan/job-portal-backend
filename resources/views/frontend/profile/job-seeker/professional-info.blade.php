@extends('frontend.profile.job-seeker.index')
@section('profile-content')
    <div class="card-box">
        <div class="wow fadeInUp" data-wow-delay="0.5s">
            <div>
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="mb-4 text-uppercase text-left">
                            <i class="fa fa-briefcase"></i> &nbsp; Experience
                        </h5>
                    </div>
                    <div class="col-lg-6">
                        <i type="button" class="fa fa-edit cursor-pointer"
                           data-bs-toggle="modal"
                           data-bs-target="#exampleModal"
                           style="float: right;"
                           onclick="resetForm()"
                        >
                        </i>
                    </div>
                </div>

                @foreach($experiences as $experience)
                    <div class="row text-left">
                        <div class="col-lg-10">
                            <h5>{{ $experience->company->name }}</h5>
                            <strong>{{ $experience->designation }}</strong> <br/>
                            <small>
                                <b class="fst-italic">
                                    {{ date("F j, Y", strtotime($experience->from_date)) }}
                                    - {{ $experience->to_date ? date("F j, Y", strtotime($experience->to_date)) : 'Present' }}
                                    | {{ $experience->address }}
                                </b>
                            </small>
                            <p>{{ $experience->description }}</p>
                        </div>
                        <div class="col-lg-2">
                            <i class="fa fa-edit experience-modal-btn"
                               data-bs-toggle="modal"
                               data-bs-target="#exampleModal"
                               style="cursor: pointer"
                               onclick="experienceInfo({{ json_encode($experience) }})">
                            </i>
                            &nbsp;
                            <i class="fa fa-trash"
                               style="cursor: pointer"
                               onclick="handleDelete('{{url('job-seeker/profile/professional-info/'.$experience->id.'/delete')}}')">
                            </i>
                        </div>
                    </div>
                @endforeach

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="/job-seeker/profile/professional-info" method="POST" id="professional-info">
                            @csrf
                            <input type="hidden" name="id" id="id" value=""/>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Experience</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mt-2">
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group text-left">
                                                <label for="companies_id">Company Name</label>
                                                <select type="text" class="form-control" name="companies_id"
                                                        id="companies_id">
                                                    <option value="">Select Company</option>
                                                    @foreach($companies as $company)
                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                    @endforeach
                                                </select>
                                                <small class="text-danger">{{ $errors->first('companies_id') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group text-left">
                                                <label for="designation">Designation</label>
                                                <input type="text" class="form-control" id="designation"
                                                       name="designation"/>
                                                <small class="text-danger">{{ $errors->first('designation') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-2">
                                            <div class="form-group text-left">
                                                <label for="from_date">From</label>
                                                <input type="date" class="form-control" id="from_date"
                                                       name="from_date"/>
                                                <small class="text-danger">{{ $errors->first('from_date') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-2">
                                            <div class="form-group text-left">
                                                <label for="to_date">To</label>
                                                <input type="date" class="form-control" id="to_date" name="to_date"/>
                                                <small class="text-danger">{{ $errors->first('to_date') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group text-left">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address"/>
                                                <small class="text-danger">{{ $errors->first('address') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group text-left">
                                                <label for="description">Summary</label>
                                                <textarea rows="2" class="form-control" id="description"
                                                          name="description"> </textarea>
                                                <small class="text-danger">{{ $errors->first('description') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        @endsection
        @section('scripts')
            <script>
                let id = $('#id');
                let companies_id = $('#companies_id');
                let designation = $('#designation');
                let from_date = $('#from_date');
                let to_date = $('#to_date');
                let address = $('#address');
                let description = $('#description');

                function experienceInfo(data = null) {
                    id.val(data.id);
                    companies_id.val(data.companies_id);
                    designation.val(data.designation);
                    from_date.val(data.from_date);
                    to_date.val(data.to_date);
                    address.val(data.address);
                    description.val(data.description);
                }

                function resetForm() {
                    id.val('');
                    companies_id.val('');
                    designation.val('');
                    from_date.val('');
                    to_date.val('');
                    address.val('');
                    description.val('');
                }


                function handleDelete(url) {
                    window.location.replace(url);
                }
            </script>
@endsection
