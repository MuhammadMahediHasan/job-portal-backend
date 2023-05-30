@extends('frontend.profile.company.index')
@section('profile-content')
    <div class="card-box">
        <div class="wow fadeInUp" data-wow-delay="0.5s">
            <div class="row mt-2">
                <div class="col-12">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Salary</th>
                        <th>Nature</th>
                        <th>Vacancy</th>
                        <th>Dead Line</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @forelse($jobs as $job)
                            <tr>
                                <td>{{ $job->jobCategory->name }}</td>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->location }}</td>
                                <td>{{ $job->salary_range }}</td>
                                <td>{{ $job->job_nature }}</td>
                                <td>{{ $job->vacancy }}</td>
                                <td>{{ date('d-m-Y', strtotime($job->dead_line)) }}</td>
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8"></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
