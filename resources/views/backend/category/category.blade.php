@extends('backend.index')
@section('content')
    <div class="container-fluid" id="vue-component">
        <div class="row">
            <div class="col-md-12">
                <!-- Button trigger modal -->
                <a href="#" class="btn btn-dark btn-sm modal-btn btn-sm" role="button" aria-disabled="true"
                   data-toggle="modal" data-target="#exampleModal">Add Category</a>

            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {!! Form::open(['url' => '/admin/category','method'=>'post']) !!}
                        <input type="hidden" name="sl_no" value="0">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Form::label('', 'Name *:') !!}
                                        {!! Form::text('name', '',$attributes=['class'=>'form-control']) !!}
                                        <span class="text-danger">{{ $errors->first('name')  }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-dark btn-sm">Save</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Heading -->
        <br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Category</h6>
            </div>
            <div class="card-body">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="dataTables_length" id="dataTable_length"></div>
                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $value)
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td> {{ $value->name }} </td>
                                <td class="justify-content-center">
                                    {{ Form::open(['url' => "/admin/category/$value->id", 'method'=>'DELETE'])  }}
                                    <button class="btn btn-default text-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    {{ Form::close()  }}
                                    {{ Form::open(['url' => "/admin/category/$value->id/edit", 'method'=>'GET'])  }}
                                    <button class="btn btn-default text-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    {{ Form::close()  }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
