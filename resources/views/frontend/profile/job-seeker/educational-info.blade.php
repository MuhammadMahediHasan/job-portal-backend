@extends('frontend.profile.job-seeker.index')
@section('profile-content')
    <div class="card-box">
        <div class="wow fadeInUp" data-wow-delay="0.5s">
            <div>
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="mb-4 text-uppercase text-left">
                            <i class="fa fa-graduation-cap"></i> &nbsp; Educational Information
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

                @foreach($educationalInfos as $info)
                    <div class="row text-left">
                        <div class="col-lg-10">
                            <h5>{{ $info->institute }}</h5>
                            <strong>{{ $info->degree }}</strong> <br/>
                            <small>
                                <b class="fst-italic">
                                    {{ date("F j, Y", strtotime($info->from_date)) }}
                                    - {{ $info->to_date ? date("F j, Y", strtotime($info->to_date)) : 'Present' }}
                                    | {{ $info->address }}
                                </b>
                            </small>
                        </div>
                        <div class="col-lg-2">
                            <i class="fa fa-edit experience-modal-btn"
                               data-bs-toggle="modal"
                               data-bs-target="#exampleModal"
                               style="cursor: pointer"
                               onclick="experienceInfo({{ json_encode($info) }})">
                            </i>
                            &nbsp;
                            <i class="fa fa-trash"
                               style="cursor: pointer"
                               onclick="handleDelete('{{url('job-seeker/profile/educational-info/'.$info->id.'/delete')}}')">
                            </i>
                        </div>
                    </div>
                @endforeach

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="/job-seeker/profile/educational-info" method="POST" id="educational-info">
                            @csrf
                            <input type="hidden" name="id" id="id" value=""/>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Educational</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mt-2">
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group text-left">
                                                <label for="institute">Institute</label>
                                                <input type="text" class="form-control" id="institute"
                                                       name="institute"/>
                                                <small class="text-danger">{{ $errors->first('institute') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group text-left">
                                                <label for="degree">Degree</label>
                                                <input type="text" class="form-control" id="degree" name="degree"/>
                                                <small class="text-danger">{{ $errors->first('degree') }}</small>
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
                let institute = $('#institute');
                let degree = $('#degree');
                let from_date = $('#from_date');
                let to_date = $('#to_date');

                function experienceInfo(data = null) {

                    console.log(data)
                    id.val(data.id);
                    institute.val(data.institute);
                    degree.val(data.degree);
                    from_date.val(data.from_date);
                    to_date.val(data.to_date);
                }

                function resetForm() {
                    id.val('');
                    institute.val('');
                    degree.val('');
                    from_date.val('');
                    to_date.val('');
                }


                function handleDelete(url) {
                    window.location.replace(url);
                }
            </script>
@endsection
