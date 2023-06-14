@extends('frontend.layouts.app')
@section('content')
    <div class="page-header">
        <div class="overlay">
            <div class="container">
                <h3>Search for a Job</h3>
                <form>
                    <div class="row sm-gutters">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="search"
                                       placeholder="Job title, skills, keywords etc..."
                                       value="{{ request('search') }}"
                                       class="form-control title" autoComplete="off"/>
                            </div>
                        </div>
                    </div>
                    <div class="row sm-gutters mt-3">
                        <div class="col-sm-3">
                            <div class="form-group select">
                                <select name="category_id" placeholder="category" class="form-control category">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option
                                            @selected(request('category_id') == $category->id)
                                            value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group select">
                                <select name="type" placeholder="type" class="form-control type">
                                    <option value="">Job Type</option>
                                    @foreach($types as $key => $type)
                                        <option
                                            @selected(request('type') == $key)
                                            value="{{ $key }}">
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group select">
                                <select name="skill_id" placeholder="skill" class="form-control skill">
                                    <option value="">Select Skill</option>
                                    @foreach($skills as $skill)
                                        <option
                                            @selected(request('skill_id') == $skill->id)
                                            value="{{ $skill->id }}">
                                            {{ $skill->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-block btn-primary">
                                <i class="fa fa-search"></i>&nbsp;Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
        <div class="row">
            <div class="col-sm-3">
                <div class="sidebar">
                    <div class="sidebar-item">
                        <h4 class="title">Industry</h4>
                        <ul>
                            <li>
                                <input type="checkbox"/>
                                IT/Telecommunication <span>40</span>
                            </li>
                            <li>
                                <input type="checkbox"/>
                                Education <span>24</span>
                            </li>
                            <li>
                                <input type="checkbox"/>
                                Real State <span>30</span>
                            </li>
                            <li>
                                <input type="checkbox"/>
                                Garments/Textile <span>15</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sidebar">
                    <div class="sidebar-item">
                        <h4 class="title">Qualification</h4>
                        <ul>
                            <li>Masters <span>40</span></li>
                            <li>Honors <span>24</span></li>
                            <li>Diploma <span>30</span></li>
                            <li>HSC/SSC <span>15</span></li>
                        </ul>
                    </div>
                </div>
                <div class="sidebar">
                    <div class="sidebar-item">
                        <h4 class="title">Experience</h4>
                        <ul>
                            <li>More Then 5 Years <span>40</span></li>
                            <li>4 to 5 Years <span>24</span></li>
                            <li>3 to 4 Years <span>30</span></li>
                            <li>2 to 3 Years <span>15</span></li>
                            <li>1 to 2 Years <span>5</span></li>
                            <li>Less Then 1 Years <span>0</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">

                    @foreach($jobs as $job)
                        @include('frontend.components.job')
                    @endforeach

                    <div class="pagination-wrapper float-end">
                        {{ $jobs->onEachSide(5)->links() }}
                    </div>

                    {{-- <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
