@extends('admin.layouts.mainlayout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Nepal</h1>

    <div>
        <a href="{{route('destination.addcountries',$country->id)}}" class="btn btn-info">Add New Destination</a>
    </div>
    @include('message.message')
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                All {{$country->countryname}} Related packages
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Destination</th>
                            <th>Duration</th>
                            <th>Difficulty</th>
                            <th>Price Per Person</th>
                            <th>Top Destination</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Destination</th>
                            <th>Duration</th>
                            <th>Difficulty</th>
                            <th>Price Per Person</th>
                            <th>Top Destination </th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($countryDests as $countryDest)

                        <tr>
                            <td>{{$countryDest->title}}</td>
                            <td>{{$countryDest->duration}}</td>
                            <td>{{$countryDest->difficulty}}</td>
                            <td>{{$countryDest->price}}</td>
                            <td>
                                @if($countryDest->topdest==0)
                                <a href="{{route('destination.addtop',$countryDest->id)}}"><button class="btn btn-info"> Add</button></a>
                                @else
                                <a href="{{route('destination.removetop',$countryDest->id)}}"><button class="btn btn-warning"> Remove</button></a>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{route('destination.infoDestination',$countryDest->id)}}" class="btn btn-info m-1"><i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{ route('countrydestination.edit', ['id'=>$country->id, 'destid'=>$countryDest->id]) }}" class="btn btn-warning m-1">

                                    <i class="fas fa-edit"></i>
                                </a>
                                <form style="display: inline" method="post" action="{{route('destination.deleteDestination',$countryDest->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger m-1 btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
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
@endsection
