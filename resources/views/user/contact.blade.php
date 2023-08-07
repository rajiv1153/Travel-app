@extends('user.layouts.mainlayout')
@section('content')

<!-- ! Start of content -->
<section class="contact__section">
    <div class="contact__banner">
        <img src="{{url('/banner/b3.jpg')}}" class="banner__img" alt="" />
        <h1 class="heading">Get in Touch with Us</h1>
    </div>

    <div class="contact__wrapper">
        <div class="contact__form">
            <div class="sub__heading">
                <h3>Contact Us Form</h3>
            </div>
            @include('message.message')
            <form action="{{route('view.postmsg')}}" method="POST" class="form">
                @csrf
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter Your Full Name" required />
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Your Address" required />
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email Address" required />
                </div>
                <div class="form-group">
                    <label for="contactnumber">Contact Number</label>
                    <input type="number" min="1" name="contactnumber" id="contactnumber" class="form-control" placeholder="Enter Your Contact Number" required />
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" placeholder="Enter Your Message" class="form-control" id="message" required></textarea>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary" />
        </div>
        </form>
        <div class="contact__address">
            <div class="sub__heading">
                <h3>Contact Address</h3>
            </div>
            <div class="contact__item">

                <div class="title">
                    <span class="material-icons">account_circle</span>Director
                </div>
                <div class="content ">
                    {{$contact->name}}
                </div>
            </div>
            <div class="contact__item">

                <div class="title">
                    <span class="material-icons">location_on</span>Address
                </div>
                <div class="content ">
                    {{$contact->address}}
                </div>
            </div>

            <div class="contact__item">
                <div class="title">
                    <span class="material-icons">call</span>Contact Number
                </div>
                <div class="content ">
                    {{$contact->phone}}
                </div>
            </div>
            <div class="contact__item">
                <div class="title">
                    <span class="material-icons">email</span>Email
                </div>
                <div class="content ">
                    {{$contact->email}}
                </div>
            </div>
        </div>
        <div class="map__wrapper">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28262.13079913638!2d85.31053821466584!3d27.693615498500222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e2c38d87eb%3A0x8646b46ca5ab0660!2sTravel%2024%20Nepal!5e0!3m2!1sen!2snp!4v1598167470319!5m2!1sen!2snp" width="100%" height="100%" frameborder="0" style="border: 0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</section>

<!-- ! end of Content -->
@endsection
