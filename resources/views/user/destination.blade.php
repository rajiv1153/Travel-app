@extends('user.layouts.mainlayout')
@section('content')

<!-- ! Start of content -->
<section class="destination__wrapper" style="padding-bottom:50px; ">
    <div class="dest__banner">
        <img src="{{url('/countrydestimage'.'/'.$destination->imagename)}}" class="banner__img" alt="" />
        <!-- <h1 class="heading">{{$destination->title}}</h1> -->
    </div>
    <div class="bg-light w-100 shadow text-uppercase sticky-top options" style="top: 70px; z-index: 10000;">
        <ul class="container p-0 d-flex justify-content-between py-2 my-0 flex-md-row flex-column text-center">
            <li class="list-unstyled ">
                <a href="#introduction" class="btn btn-light">Introduction</a>
            </li>
            <li class="list-unstyled">
                <a href="#facts" class="btn btn-light">Itenary</a>
            </li>
            <li class="list-unstyled">
                <a href="#facts" class="btn btn-light">included</a>
            </li>
            <li class="list-unstyled">
                <a href="#facts" class="btn btn-light">Date</a>
            </li>
            <li class="list-unstyled">
                <button class="btn btn-light">FAQs</button>
            </li>
            <li class="list-unstyled">
                <button class="btn btn-light">Reviews</button>
            </li>
        </ul>
    </div>
    <div class="destination__detail">
        <div class="trip">
            <div class="sub__heading">
                <h3>Trip Overview</h3>
            </div>
            <div class="trip__overview">
                <div class="trip__highlights">
                    <h4>Trip Highlights</h4>

                    <ul>
                        <?php $highlightArray=explode(':?:',trim($destination->highlights,':?:'))?>
                        @for($i=0;$i<sizeOf($highlightArray);$i++) <li>{{$highlightArray[$i]}}</li>
                            @endfor
                    </ul>
                </div>
                <div class="trip__intro" id="introduction">
                    <h4>Trip Introduction</h4>
                    <div class="intro__content">
                        <p>
                            {!! $destination->tripintroduction !!}
                        </p>

                    </div>
                </div>

                <div class="trip__fact" id="facts">
                    <h4>Trip Facts</h4>
                    <ul>
                        <li><strong>Duration: </strong><span>{{$destination->duration}}</span></li>
                        {{-- <li><strong>Departure From: </strong><span>Pokhara</span></li> --}}
                        {{-- <li><strong>Arrival to: </strong><span>Pokhara</span></li> --}}
                        <li>
                            <strong>Destination: </strong><span>{{$destination->title}}</span>
                        </li>
                        <li><strong>Difficulty Level: </strong><span>{{$destination->difficulty}}</span></li>
                        {{-- <li><strong>Max-Altitude: </strong><span>4130mtr</span></li> --}}
                        {{-- <li><strong>Accommodation: </strong><span>TeaHouse</span></li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="booking__wrapper">
            <h3>Book You Trip Now</h3>
            @include('message.message')
            <p>Price Start From <span class="price">{{$destination->price}}</span> per person</p>
            <div class="booking__form">
                <form action="{{route('view.booking',$destination->id)}}" method="post">
                    @csrf
                    <div class="input__box">
                        <input type="date" name="date" id="date" required />
                    </div>
                    <div class="input__box disabled">
                        <input type="text" name="duration" id="duration" disabled value="{{$destination->duration}}" required />
                    </div>
                    <div class="input__box">
                        <input type="number" min="1" name="people" id="people" placeholder="No. of Traveller" required />
                    </div>
                    <div class="input__box">
                        <input type="text" name="fullname" id="fullname" placeholder="Full Name" required />
                    </div>
                    <div class="input__box">
                        <input type="email" min="1" name="email" id="email" placeholder="Email" required />
                    </div>

                    <div class="input__box">
                        <input type="number" min="1" name="contactNumber" id="contactNumber" placeholder="Contact Number" required />
                    </div>
                    <div class="input__box"><input type="text" name="country" placeholder="Your Country Name" required /></div>
                    <div class="input__box">
                        <textarea name="message" id="message" placeholder="Your Message" wrap="hard"></textarea>
                    </div>
                    <div class="input__box">
                        <input type="submit" value="Book Now" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ! end of Content -->
@endsection
