@extends('backend.index')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>


        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-3 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                        Today Employer
                        <div
                            class="text-white small">
                            {{ \Illuminate\Support\Facades\DB::table('companies')->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        Total Job Seeker
                        <div
                            class="text-white small">
                            {{ \Illuminate\Support\Facades\DB::table('job_seekers')->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        Total Jobs
                        <div
                            class="text-white small">
                            {{ \Illuminate\Support\Facades\DB::table('job_posts')->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        Total Category
                        <div class="text-white small">
                            {{ \Illuminate\Support\Facades\DB::table('job_categories')->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
