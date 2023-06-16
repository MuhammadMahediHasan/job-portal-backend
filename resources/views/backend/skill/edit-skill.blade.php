@extends('backend.index')
@section('content')
    <div class="container-fluid" id="vue-component">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h3 mb-2 text-gray-800">Skill</h1>

            </div>
        </div>
        <!-- Page Heading -->
        <br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$data->name}} Edit</h6>
            </div>
            <div class="card-body">
                <div class="row"></div>
                {!! Form::open(['url' => "/admin/skill/$data->id",'method'=>'PUT']) !!}
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('', 'Name *:') !!}
                                {!! Form::text('name', $data->name,$attributes=['class'=>'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('name')  }}</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-dark btn-sm">Save</button>
                            <a href="/agent" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        new Vue({
            el: '#vue-component',
            data: {
                country_id: '{{ $data->country_id }}',
                division_id: '{{ $data->division_id }}',
                district_id: '{{ $data->district_id }}',
                upazila_id: '{{ $data->upazila_id }}',
                divisionData: {},
                districtData: {},
                upazilaData: {},
            },
            methods: {
                getDivision: function (id) {
                    const _this = this;
                    axios.get('/get_divison/' + id)
                        .then((response) => {
                            _this.divisionData = response.data;
                        })
                        .catch((error) => {
                            console.log(error);
                        })
                },
                getDistrict: function (id) {
                    const _this = this;
                    axios.get('/get_district/' + id)
                        .then((response) => {
                            _this.districtData = response.data;
                        })
                        .catch((error) => {
                            console.log(error);
                        })
                },
                getUpazila: function (id) {
                    const _this = this;
                    axios.get('/get_upazila/' + id)
                        .then((response) => {
                            _this.upazilaData = response.data;
                        })
                        .catch((error) => {
                            console.log(error);
                        })
                },
            },
            mounted() {
                const _this = this;
                this.getDivision(_this.country_id);
                this.getDistrict(_this.division_id);
                this.getUpazila(_this.district_id);
            }
        })
    </script>
@endsection
