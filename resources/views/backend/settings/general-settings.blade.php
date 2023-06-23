@extends('backend.index')
@section('content')
    <div class="container-fluid" id="vue-component">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h3 mb-2 text-gray-800">General Setting</h1>

            </div>
        </div>
        <!-- Page Heading -->
        <br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$data->name ?? ''}} Edit</h6>
            </div>
            <div class="card-body">
                <div class="row"></div>
                {!! Form::open(['url' => "/admin/general-setting",'method'=>'POST']) !!}
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('', 'Name *:') !!}
                                {!! Form::text('name', $data->name ?? '', ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('name')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('', 'Phone *:') !!}
                                {!! Form::text('phone', $data->phone ?? '', ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('phone')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('', 'Email *:') !!}
                                {!! Form::text('email', $data->email ?? '', ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('email')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('', 'Location *:') !!}
                                {!! Form::text('location', $data->location ?? '', ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('location')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('', 'Twitter Link *:') !!}
                                {!! Form::text('twitter_link', $data->twitter_link ?? '', ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('twitter_link')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('', 'Facebook Link *:') !!}
                                {!! Form::text('facebook_link', $data->facebook_link ?? '', ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('facebook_link')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('', 'Youtube Link *:') !!}
                                {!! Form::text('youtube_link', $data->youtube_link ?? '', ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('youtube_link')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('', 'Linkedin Link *:') !!}
                                {!! Form::text('linkedin_link', $data->linkedin_link ?? '', ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('linkedin_link')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('', 'About us *:') !!}
                                {!! Form::textarea('about_us', $data->about_us ?? '', ['class' => 'form-control, ckeditor']) !!}
                                <span class="text-danger">{{ $errors->first('about_us')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('', 'Help *:') !!}
                                {!! Form::textarea('help', $data->help ?? '', ['class' => 'form-control, ckeditor']) !!}
                                <span class="text-danger">{{ $errors->first('help')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('', 'FQAs *:') !!}
                                {!! Form::textarea('fqas', $data->fqas ?? '', ['class' => 'form-control, ckeditor']) !!}
                                <span class="text-danger">{{ $errors->first('fqas')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('', 'Our Services *:') !!}
                                {!! Form::textarea('our_services', $data->our_services ?? '', ['class' => 'form-control, ckeditor']) !!}
                                <span class="text-danger">{{ $errors->first('our_services')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('', 'Privacy Policy *:') !!}
                                {!! Form::textarea('privacy_policy', $data->privacy_policy ?? '', ['class' => 'form-control, ckeditor']) !!}
                                <span class="text-danger">{{ $errors->first('privacy_policy')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('', 'Terms and condition *:') !!}
                                {!! Form::textarea('terms_and_condition', $data->terms_and_condition ?? '', ['class' => 'form-control, ckeditor']) !!}
                                <span class="text-danger">{{ $errors->first('terms_and_condition')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-dark btn-sm">Save</button>
                            <a href="/agent" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
