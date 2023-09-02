@extends('frontend.profile.job-seeker.index')
@section('profile-content')
    <div class="card-box">
        <div class="wow fadeInUp" data-wow-delay="0.5s">
            <div>
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="mb-4 text-uppercase text-left">
                            <i class="fa fa-briefcase"></i> &nbsp; Skill
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

                @foreach($skillsInfo as $skill)
                    <div class="row text-left">
                        <div class="col-lg-10">
                            <h5>{{ $skill->skill->name }}</h5>
                            <strong>{{ $skill->description }}</strong> <br/>
                        </div>
                        <div class="col-lg-2">
                            <i class="fa fa-edit experience-modal-btn"
                               data-bs-toggle="modal"
                               data-bs-target="#exampleModal"
                               style="cursor: pointer"
                               onclick="experienceInfo({{ json_encode($skill) }})">
                            </i>
                            &nbsp;
                            <i class="fa fa-trash"
                               style="cursor: pointer"
                               onclick="handleDelete('{{url('job-seeker/profile/skill/'.$skill->id.'/delete')}}')">
                            </i>
                        </div>
                    </div>
                @endforeach

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="/job-seeker/profile/skill" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id" value=""/>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Skill</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mt-2">
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group text-left">
                                                <label for="skill_id">Skill</label>
                                                <select type="text" class="form-control" name="skill_id"
                                                        id="skill_id">
                                                    <option value="">Select</option>
                                                    @foreach($skills as $skill)
                                                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                    @endforeach
                                                </select>
                                                <small class="text-danger">{{ $errors->first('skill_id') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group text-left">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control" id="description"
                                                       name="description"/>
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
                let skill_id = $('#skill_id');
                let description = $('#description');

                function experienceInfo(data = null) {
                    console.log(data)
                    id.val(data.id);
                    skill_id.val(data.skill_id);
                    description.val(data.description);

                }

                function resetForm() {
                    id.val('');
                    skill_id.val('');
                    description.val('');
                }

                function handleDelete(url) {
                    window.location.replace(url);
                }
            </script>
@endsection
