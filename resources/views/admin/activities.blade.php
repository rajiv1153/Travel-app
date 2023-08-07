@extends('admin.layouts.mainlayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Activities </h1>

    @include('message.message')

    <div>
        <a href="{{ route('admin.activities.create') }}" class="btn btn-info">
            Add New Activity
        </a>
    </div>
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                All Activities
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Activity</th>
                            <th>price</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Activity</th>
                            <th>price</th>
                            <th class="text-center">Action</th>
                        </tr>

                    </tfoot>
                    <tbody>
                        @foreach ($activities as $activity)

                        <tr>
                            <td>{{$activity->title}}</td>
                            <td>{{$activity->price}}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.activities.edit', $activity->id) }}" class="btn btn-warning  m-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form style="display:inline" method="POST" action="{{ route('admin.activities.delete', ['id'=>$activity->id]) }}">
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
