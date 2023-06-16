@extends('frontend.profile.company.index')
@section('profile-content')
    <div class="card-box">
        <div class="wow fadeInUp" data-wow-delay="0.5s">
            <div class="row mt-2">
                <h5>Applicants for {{ $applies->first()->job->title }}</h5>

                <div class="col-12 mt-2">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <th>#</th>
                        <th>Applicant Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Short Profile</th>
                        <th>Current Company</th>
                        <th>Resume</th>
                        </thead>
                        <tbody>
                        @forelse($applies as $apply)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $apply->jobSeeker->name }}</td>
                                <td>{{ $apply->jobSeeker->email }}</td>
                                <td>{{ $apply->jobSeeker->phone }}</td>
                                <td>{{ $apply->jobSeeker->portfolio }}</td>
                                <td>{{ $apply->currentCompany->name ?? '' }}</td>
                                <td>
                                    @if(file_exists('resume/' . $apply->resume))
                                        <a href="{{ '/resume/' . $apply->resume }}"
                                           target="_blank">View</a>
                                    @elseif(file_exists('resume/' . $apply->jobSeeker->id . '.pdf'))
                                        <a href="{{ '/resume/' . $apply->jobSeeker->id . '.pdf' }}"
                                           target="_blank">View</a>
                                    @else
                                        <span class="badge bg-danger">No resume found.</span>
                                    @endif
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
