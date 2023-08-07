@extends('admin.layouts.mainlayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="{{route('admin.activities')}}" class="btn btn-warning mb-3"><i class="fas fa-angle-left"></i> Go Back</a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add New Activity</h1>
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

    @if(session()->has('titleerror'))

    <div class="alert alert-danger">{{session()->get('titleerror')}}</div>

    @endif


    <div class="col-md-10 m-auto">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-600">
                    New Activity Form
                </h6>
            </div>
            <div class="card-body">
                <form action="{{route('admin.activities.store')}}" class="form" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" required value="{{old('title')}}">
                    </div>
                    <div class="form-group">

                        <label for="image">Image</label>
                        <input type="file" accept="image/png, image/jpeg" name="image" class="form-control-file" id="image">


                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" min="0" class="form-control" name="price" value="{{old('price')}}">
                    </div>
                    <div class="form-group">
                        <label for="acticitycontent">Content</label>

                        <textarea name="content" id="acticitycontent" cols="30" rows="10" class="form-control">{{old('content')}}</textarea>

                    </div>

                    <div class="form-group text-center mt-4">
                        <input type="submit" value="submit" class="btn btn-success" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
