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
                        Today Application Received
                        <div
                            class="text-white small">10</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        This Month Application Received
                        <div
                            class="text-white small">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        Last Month Application Received
                        <div
                            class="text-white small">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        Total Application Received
                        <div class="text-white small">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        Today Delivered
                        <div
                            class="text-white small">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                        This Month Delivered
                        <div
                            class="text-white small">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-light text-black shadow">
                    <div class="card-body">
                        Last Month Delivered
                        <div
                            class="text-black small">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-dark text-white shadow">
                    <div class="card-body">
                        Total Delivered
                        <div class="text-white small">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-dark text-white shadow">
                    <div class="card-body">
                        SMS Balance
                        <div class="text-white small">0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
