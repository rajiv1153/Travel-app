@extends('admin.layouts.mainlayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">All Destination Countries</h1>

    @include('message.message')

    <div>
        <button class="btn btn-info" data-toggle="modal" data-target="#addcountrymodal">
            Add New Country
        </button>
    </div>
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                All Destination Countries
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>No. of Destination</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Country</th>
                            <th>No. of Destination</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($countries as $country)

                        <tr>
                            <td>{{$country->countryname}}</td>
                            <td>{{count($country->countrydestinations()->get())}}</td>
                            <td class="text-center">
                                <a href="" data-toggle="modal" data-target="#editcountrymodal{{$country->id}}" class="btn btn-warning btn-edit m-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form style="display:inline" method="POST" action="{{route('destination.delete',$country->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger m-1 btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>


                        <div class="modal fade" id="editcountrymodal{{$country->id}}" tabindex="-1" role="dialog" aria-labelledby="editcountrymodallabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editcountrymodallabel">Edit Country</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- ? also check at main.js file for action -->
                                        <form action="{{route('destination.edit',$country->id)}}" class="form" id="editcountry" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <input type="file" name="image" class="form-control-file" accept="image/*" />
                                            </div>
                                            <div style="margin-bottom: 5px">
                                                <p>Current Image </p>
                                                <img height="50px" width="50px" src="{{url('/countryimage'.'/'.$country->imagename)}}">


                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="countryName" class="form-control" placeholder="Country Name" value="{{$country->countryname}}" required />
                                            </div>
                                            <input type="Submit" class="btn btn-info" value="Edit" />
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- ? add country modal -->

<div class="modal fade" id="addcountrymodal" tabindex="-1" role="dialog" aria-labelledby="addNewCountryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewCountryModalLabel">
                    Add New Country
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('destination.add')}} " class="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="image" class="form-control-file" accept="image/*" required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="countryName" class="form-control" placeholder="Country Name" required />
                    </div>
                    <input type="Submit" class="btn btn-info" value="Add" />
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
