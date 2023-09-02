@extends('backend.index')
@section('content')
    <div class="container-fluid" id="vue-component">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Employer</h6>
            </div>
            <div class="card-body">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="dataTables_length" id="dataTable_length"></div>
                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $key => $value)
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td> {{ $value->name }} </td>
                                <td> {{ $value->email }} </td>
                                <td> {{ $value->address }} </td>
                                <td> {{ $value->phone }} </td>
                                <td> {{ $value->description }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
