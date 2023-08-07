@extends('admin.layouts.mainlayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Testimonials </h1>

    @include('message.message')

    <div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-info">
            Add New Testimonial
        </a>
    </div>
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                All Testimonials
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Testiment</th>
                            <th>Rating</th>
                            <th>Country</th>


                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Testiment</th>
                            <th>Rating</th>
                            <th>Country</th>


                            <th class="text-center">Action</th>
                        </tr>

                    </tfoot>
                    <tbody>
                        @foreach ($testimonials as $testiment)

                        <tr>
                            <td>{{$testiment->name}}</td>
                            <td>{{Str::limit($testiment->testiment, 100, '...')}}</td>

                            <td>{{$testiment->rating}}</td>
                            <td>{{$testiment->country}}</td>




                            <td class="text-center">
                                <a href="{{ route('admin.testimonials.edit', $testiment->id) }}" class="btn btn-warning  m-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form style="display:inline" method="POST" action="{{ route('admin.testimonials.delete', ['id'=>$testiment->id]) }}">
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
