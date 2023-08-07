@extends('user.layouts.mainlayout')

@section('content')

<!-- ! Start of content -->
<section class="package__container">
    <div class="sub__heading">
        <h2>{{$country->countryname}}</h2>
    </div>

    <div class="package__cards">
        @foreach ($packageDest as $dest)
        <div class="dist__card">
            <a href="{{route('view.destination',$dest->slug)}}"><img src="{{url('/countrydestimage'.'/'.$dest->imagename)}}" alt="" class="dist__img" />
                <span class="material-icons rating">star star star star star_half</span>
            </a>
            <div class="dist__content">
                <div class="dist__name">
                    <a href="{{route('view.destination',$dest->slug)}}"><strong>{{$dest->title}}</strong></a>
                </div>
                <div class="dist__detail ">
                    <p><strong>Duration: </strong> {{$dest->duration}}</p>
                    <p><strong>Difficulty: </strong> {{$dest->difficulty}}</p>
                    <p><strong>Price: </strong><span class="price">US${{$dest->price}}</span></p>
                </div>
            </div>
            <a href="{{route('view.destination',$dest->slug)}}" class="dist__booknow">Book now</a>
        </div>

        @endforeach




    </div>

</section>
@endsection


<!-- ! end of Content -->
