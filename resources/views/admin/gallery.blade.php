@extends('admin.layouts.mainlayout')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gallery Mangement</h1>

    <div>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif



        <form method="post" action="{{route('admin.addToGallery')}}" enctype="multipart/form-data">

            @csrf
            <div class="bg-white p-4 border">
                <div class="form-group">
                    <input type="file" accept="image/png, image/jpeg" name="images[]" multiple class="fotm-control-file">
                </div>
                <button class="btn btn-info">Upload</button>
            </div>
        </form>
    </div>
    <div>

        <h3 class="mt-2">Images</h3>
        <div class="row">

            <style>
                a.btn.btn-danger {
                    display: none;

                }

                .image:hover a.btn.btn-danger {
                    display: block;
                }

            </style>

            @foreach($images as $image)
            <div class="col-lg-3 col-md-4 col-sm-1 relative image">
                <img src="{{ asset('gallery/'.$image) }}" alt="" class="w-100 p-2 " style="height: 200px; object-fit:cover">
                <a href="{{ route('admin.removeFromGallery', ['image'=>$image]) }}" class="btn btn-danger" style="position: absolute; top: 10%; right: 10%; cursor:pointer;">

                    <i class="fas fa-trash-alt"></i>
                </a>
            </div>
            @endforeach

        </div>

    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

@endsection

<!-- Footer -->
