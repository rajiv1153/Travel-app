@extends('user.layouts.mainlayout')
@section('content')

<section>
    <h1 class="text-center m-4">
        Our Gallery
    </h1>
    <div class="container-fluid mb-4">
        <div class="row">
            @foreach($images as $image)
            <div class=" col-md-3 col-sm-1 ">
                <img src="{{ asset('gallery/'.$image) }}" alt="" class="w-100 p-1">
            </div>
            @endforeach

        </div>

    </div>

</section>

@endsection
