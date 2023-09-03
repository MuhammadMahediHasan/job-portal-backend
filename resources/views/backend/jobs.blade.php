@extends('backend.index')
@section('content')
    <div class="container-fluid" id="vue-component">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jobs</h6>
            </div>
            <div class="card-body">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="dataTables_length" id="dataTable_length"></div>
                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
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
                                        <a href="/job-details/{{ $job->slug }}"
                                           class="btn btn-sm btn-info text-white"
                                           target="_blank">
                                            View
                                        </a>
                                        <a href="/admin/jobs/{{ $job->id }}/status"
                                           class="btn btn-sm btn-info text-white">
                                            @if($job->status == 1)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </a>
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
