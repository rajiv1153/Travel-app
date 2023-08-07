@extends('user.layouts.mainlayout')
@section('content')

<!-- ! Start of content -->
<section class="destination__wrapper" style="padding-bottom:50px; ">
    <div class="dest__banner">
        <img src="{{url('/activityimage'.'/'.$activity->image_name)}}" class="banner__img" alt="" />
        <h1 class="heading">{{$activity->title}}</h1>
    </div>
    <div class="destination__detail">
        <div class="trip">

            <div class="trip__overview mt-3 mx-2">
                <div class="trip__intro " id="introduction">
                    <h4>About Activity</h4>
                    <div class="intro__content">
                        <p>
                            {!! $activity->content !!}
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- ! end of Content -->
@endsection
