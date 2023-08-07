@extends('admin.layouts.mainlayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Contact Detail</h1>

    <div>
        @include('message.message')

        <form action="{{route('admin.postcontact')}}" method="post" class="container">
            @csrf
            <div class="form-group row">
                <input type="text" name="name" class="form-control col-md-6" id="name" placeholder="Name" value="{{$contact->name}}" required />
            </div>

            <div class="form-group row">
                <input type="text" name="email" class="form-control col-md-6" id="email" placeholder="Email" value="{{$contact->email}}" required />
            </div>
            <div class="form-group row">
                <input type="text" name="contactnumber" class="form-control col-md-6" id="contactnumber" placeholder="Contact Number" value="{{$contact->phone}}" required />
            </div>
            <div class="form-group row">
                <input type="text" name="address" class="form-control col-md-6" id="address" placeholder="{{$contact->address}}" value="Baneshwor, Kathmandu, Nepal" required />
            </div>
            <input type="submit" class="btn btn-success" value="Update" />
        </form>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
