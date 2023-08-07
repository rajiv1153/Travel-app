@extends('user.layouts.mainlayout')
@section('content')

<section class="dist__section">
    <div class="sub__heading ">
        <h3 class="mb-1">Our Activities</h3>
    </div>
    <div class="dist" style="justify-content: center">
        @foreach ($activities as $activity)

        <div class="dist__card" style="min-height: unset; height: 200px; position: relative; border-radius: unset; margin: 20px;">

            <a href="{{ route('view.activity', ['slug'=>$activity->slug])}}" style="height: 100%"><img src="{{url('/activityimage'.'/'.$activity->image_name)}}" alt="" class="dist__img" style="height: 100%; min-height: unset; object-fit: cover" />

            </a>
            <div class="dist__content " style="position: absolute; bottom: 0; left: 0; right:0; background: #00000050;">
                <div class="dist__name">
                    <a href="{{ route('view.activity', ['slug'=>$activity->slug])}}"><strong class="text-white">{{$activity->title}}</strong></a>

                </div>
            </div>
        </div>
        @endforeach


    </div>
</section>


@endsection
