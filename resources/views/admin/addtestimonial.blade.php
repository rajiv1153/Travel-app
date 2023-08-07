@extends('admin.layouts.mainlayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="{{route('admin.testimonials')}}" class="btn btn-warning mb-3"><i class="fas fa-angle-left"></i> Go Back</a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add New Testimonial</h1>
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
                    New Testimonial Form
                </h6>
            </div>
            <div class="card-body">
                <form action="{{route('admin.testimonials.store')}}" class="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" id="title" name="name" class="form-control" required value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" class="form-control" required value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" accept=" image/*" class="form-control-file" />
                    </div>


                    <div class="form-group">
                        <label for="price">Rating</label>
                        <select name="rating" id="cars" class="form-control">
                            <option default value="0">Select Rating</option>
                            <option value="1">1 Stars</option>
                            <option value="2">2 stars</option>
                            <option value="3">3 stars</option>
                            <option value="4">4 stars</option>
                            <option value="5">5 stars</option>


                        </select>
                    </div>

                    <div class="form-group">
                        <label for="testiment">Testiment</label>

                        <textarea name="testiment" id="testiment" cols="30" rows="10" class="form-control">{{old('testiment')}}</textarea>



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
