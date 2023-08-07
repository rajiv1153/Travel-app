@extends('admin.layouts.mainlayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="{{url()->previous()}}" class="btn btn-warning mb-3"><i class="fas fa-angle-left"></i> Go Back</a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{$countryDest->title}}</h1>
    <div class="col-md-10 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">
                    Trip Information
                </h6>
            </div>
            <div class="card-body text-gray-700">
                <p><strong>Destination: </strong> {{$countryDest->title}}</p>
                <p><strong>Duration: </strong> {{$countryDest->duration}}</p>
                <p><strong>Price: </strong> {{$countryDest->price}} per person</p>
                <p><strong>Difficulty: </strong> {{$countryDest->difficulty}}</p>
            </div>
        </div>
        <div class="card shadow my-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-info">
                    Trip Highlights and Information
                </h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCardExample">
                <div class="card-body">
                    <h6 class="font-weight-bold">Trip Highlights</h6>
                    <ul class="text-justify">
                        <?php $highlightArray=explode(':?:',trim($countryDest->highlights,':?:'))
                    
                     ?>
                        @for($i=0;$i<sizeOf($highlightArray);$i++) <li>{{$highlightArray[$i]}}</li>
                            @endfor
                    </ul>
                    <h6 class="mt-2 font-weight-bold">Trip information</h6>
                    <div class="text-justify">
                        <p>
                            {!!$countryDest->tripintroduction!!}
                        </p>
                        <p>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

@endsection
