@extends('frontend.layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/resume.css') }}" media="all"/>
@endsection
@section('content')
    <div class="container-xxl text-left py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-12" style="padding: 10px; margin: 10px">
                    <button class="btn btn-sm btn-info float-end" onclick="PrintElem('resume-element')">
                        <i class="fa fa-print"></i>
                        Print
                    </button>
                </div>
                <div class="col-lg-12 mt-0">
                    <div class="A4">
                        <div class="sheet" id="resume-element">
                            <div class="two-column resume">
                                <section class="resume__section resume__header">
                                    <div class="resume__content">
                                        <h1>{{ $jobSeeker->name }}</h1>
                                        <div class="info-item">
                                            <span class="info-label">
                                                <i class="fa fa-location-arrow"></i>
                                            </span>
                                            <span class="info-text">
                                                {{ $jobSeeker->address }}
                                            </span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <span class="info-text">{{ $jobSeeker->email }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <span class="info-text">{{ $jobSeeker->phone }}</span>
                                        </div>
                                    </div>
                                </section>
                                <div class="resume__columns">
                                    <div class="resume__main">
                                        <section class="resume__section resume__summary">
                                            <div class="resume__content">
                                                <div class="resume__section-title">
                                                    <i class="fa fa-user"></i>
                                                    <h2>Professional Summary</h2>
                                                </div>
                                                <div class="other">
                                                    <div class="other-info">
                                                        {{ $jobSeeker->profile }}
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="resume__section resume__experience">
                                            <div class="resume__content">
                                                <div class="resume__section-title"><i class="fa fa-briefcase"></i>
                                                    <h2>Employment History</h2>
                                                </div>
                                                @foreach($jobSeeker->experiences as $experience)
                                                    <div class="xp-item">
                                                        <div class="xp-job">
                                                            {{ $experience->designation }}
                                                            <small> {{ $experience->address }} </small>
                                                        </div>
                                                        <div class="xp-date">
                                                            {{ dateFormat($experience->start_date) }}
                                                            – {{ $experience->end_date ? dateFormat($experience->end_date) : 'Present' }}
                                                        </div>
                                                        <div class="xp-detail">
                                                            {!! $experience->description !!}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </section>
                                    </div>
                                    <div class="resume__side">
                                        <section class="resume__section resume__skills">
                                            <div class="resume__content">
                                                <div class="resume__section-title"><i class="fa fa-align-center"></i>
                                                    <h2>Skills</h2>
                                                </div>
                                                <div class="resume__text">
                                                    @foreach($jobSeeker->skills as $skill)
                                                    <div class="extra">
                                                        <div class="extra-info">{{ $skill->skill->name }}<br/>
                                                            <small>{{ $skill->description }}</small></div>
{{--                                                        <div class="extra-details">--}}
{{--                                                            <div class="extra-details__progress"--}}
{{--                                                                 style="width:90%"></div>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </section>
                                        <section class="resume__section resume__languages">
                                            <div class="resume__content">
                                                <div class="resume__section-title"><i class="fa fa-globe"></i>
                                                    <h2>Languages</h2>
                                                </div>
                                                @foreach($jobSeeker->educations as $education)
                                                <div class="extra">
                                                    <div class="extra-info">{{ $education->name }}</div>
                                                </div>
                                                @endforeach
                                                <div class="extra">
                                                    <div class="extra-info">English</div>
                                                    <div class="extra-details">
                                                        <div class="extra-details__progress" style="width:65%"></div>
                                                    </div>
                                                </div>
                                                <div class="extra">
                                                    <div class="extra-info">Spanish</div>
                                                    <div class="extra-details">
                                                        <div class="extra-details__progress" style="width:20%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function PrintElem(elem) {
            var header_str = '<html><head><title>' + document.title + '</title></head><body>';
            var footer_str = '</body></html>';
            var new_str = document.getElementById(elem).innerHTML;
            var old_str = document.body.innerHTML;
            document.body.innerHTML = header_str + new_str + footer_str;
            window.print();
            document.body.innerHTML = old_str;
            return false;
        }
    </script>

@endsection
