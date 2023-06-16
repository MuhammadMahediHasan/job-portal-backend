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
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="/company/profile/jobs/{{ $job->id }}/edit"
                                           class="btn btn-sm btn-info text-white">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="/company/profile/jobs/{{ $job->id }}/apply" title="Apply"
                                           class="btn btn-sm btn-default text-white">
                                            <i class="fa fa-user"></i>
                                        </a>
                                        <form method="POST" action="/company/profile/jobs/{{ $job->id }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="8">No Job Found</th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
