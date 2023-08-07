<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel 24</title>

    <!-- ! bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />

    <!-- ! font Nunito -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet" />
    <!-- ! material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('/css/user/main.css')}}" />


</head>


<body>

    <header class="main__header
    
   @if(!Request::is('/'))
    scrolled remove-fixed top-sticky shadow-none
    @endif
    " id="main__header" style="z-index: 100000">


    <div class="container" style="z-index: 100000">
  <div class="row">
    <div class="col-sm">
    <div class="logo__wrapper">
            <a href="/" class="logo__btn">
                <img class="logo"><img src="{{ asset('logo.png') }}" style=" height: 95px; object-fit: contain; margin: -50px -10px; transform: scale(1.1);" alt="travel 24 logo ">
            </a>
        </div>

        <div class="burger" id="burger__menu">
            <div></div>
            <div></div>
            <div></div>
        </div>

        </div>
    <div class="col-sm">
    <nav>
            <ul class="nav__items">
                <li class="nav__link"><a href="/#intro">About</a></li>
                <li class="nav__link dropdown">
                    <div class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Destinations
                        <ul class="dropdown-menu dropdown-menu-right bg-transparent " style="background-color: white !important; color: black !important;">
                            @foreach($countries as $country)
                            <li>
                                <a class="dropdown-item dropdown-toggle" href="{{route('view.package',$country->slug)}}">
                                    {{$country->countryname}}</a>
                                @if (count($country->countrydestinations()->get())>0)
                                <ul class="submenu submenu-left dropdown-menu bg-transparent" style="left:100%; top: -10px;">
                                    @foreach ($country->countrydestinations()->get()->take(5) as $package)
                                    <li>
                                        <a class="dropdown-item" href="{{route('view.destination',$package->slug)}}">{{$package->title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                    </div>



                </li>
                <li class="nav__link">
                    <div class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Activities

                        <ul class="dropdown-menu dropdown-menu-right bg-transparent " style="background-color: white !important; color: black !important;">
                            @foreach($activities->take(6) as $activity)
                            <li>
                                <a class="dropdown-item" href="{{ route('view.activity', ['slug'=>$activity->slug])}}">

                                    {{$activity->title}}</a>
                            </li>
                            @endforeach
                            @if(count($activities) > 6)
                            <hr>
                            <li>
                                <a href="{{route("view.activities")}}" class="dropdown-item">
                                    view More Activities
                                </a>
                            </li>
                            @endif


                        </ul>
                    </div>
                </li>


                <li class="nav__link"><a href="{{route('view.gallery')}}">Gallery</a></li>

                <li class="nav__link"><a href="#">Testimonials</a></li>

                <li class="nav__link"><a href="{{route('view.contactus')}}">Contact</a> </li>

            </ul>
        </nav>
        </div>
    <div class="col-sm">
    <a href="#" class="fa fa-facebook"> </a>&nbsp;&nbsp;  
    <a href="#" class="fa fa-instagram"> </a>&nbsp;&nbsp;
    <a href="#" class="fa fa-youtube"> </a>&nbsp;&nbsp;
    <a href="#" class="fa fa-whatsapp"> </a>


    </div>
  </div>
</div>
       
        
        
    </header>
    <div class="sidebar" id="sidebar">
        <ul class="nav__items">
            <li class="nav__link flex-column">
                <a href="/" class="nav-link collapsed d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#destinations">Destinations <i class="fas fa-chevron-down rotate"></i></a>
                <ul id="destinations" class="collapse p-0">
                    @foreach($countries as $country)
                    <li class="nav-item list-unstyled">
                        <a href="{{route('view.package',$country->id)}}" class="nav-link">{{$country->countryname}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li class="nav__link"><a href="#">About us</a></li>
            <li class="nav__link"><a href="{{route('view.contactus')}}">Contact us</a></li>
            <li class="nav__link"><a href="#">Our Gallery</a></li>
        </ul>
    </div>
    <div class="backdrop" id="backdrop"></div>

    @yield('content')

    <footer class="main__footer">
        <div class="contacts">
            <div class="sub__heading">
                <h5>Nepal</h5>
            </div>
            <div class="contact__item d-flex justify-content-between align-items-center">
                <div class="title align-items-center d-flex">
                    <span class="material-icons">account_circle</span>
                </div>
                <div class="content ">
                    {{$contact->name}}
                </div>
            </div>
            <div class="contact__item d-flex justify-content-between align-items-center">
                <div class="title align-items-center d-flex">
                    <span class="material-icons">location_on</span>
                </div>
                <div class="content ">
                    {{$contact->address}}
                </div>
            </div>

            <div class="contact__item d-flex justify-content-between align-items-center">
                <div class="title align-items-center d-flex">
                    <span class="material-icons">call</span>

                </div>
                <div class="content ">
                    {{$contact->phone}}
                </div>
            </div>
            <div class="contact__item d-flex justify-content-between align-items-center">
                <div class="title align-items-center d-flex">
                    <span class="material-icons">email</span>
                </div>
                <div class="content ">
                    {{$contact->email}}
                </div>
            </div>
        </div>

        <div class="contacts">
            <div class="sub__heading">
                <h5>USA</h5>
            </div>
            <div class="contact__item d-flex justify-content-between align-items-center">
                <div class="title align-items-center d-flex">
                    <span class="material-icons">account_circle</span>
                </div>
                <div class="content ">
                    {{$contact->name}}
                </div>
            </div>
            <div class="contact__item d-flex justify-content-between align-items-center">
                <div class="title align-items-center d-flex">
                    <span class="material-icons">location_on</span>
                </div>
                <div class="content ">
                    {{$contact->address}}
                </div>
            </div>

            <div class="contact__item d-flex justify-content-between align-items-center">
                <div class="title align-items-center d-flex">
                    <span class="material-icons">call</span>

                </div>
                <div class="content ">
                    {{$contact->phone}}
                </div>
            </div>
            <div class="contact__item d-flex justify-content-between align-items-center">
                <div class="title align-items-center d-flex">
                    <span class="material-icons">email</span>
                </div>
                <div class="content ">
                    {{$contact->email}}
                </div>
            </div>
        </div>

        <div class="map">
            We Accept:
        <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
        <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
            <div class="sub__heading">
                <h5>Location:</h5>
            </div>

            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28262.13079913638!2d85.31053821466584!3d27.693615498500222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e2c38d87eb%3A0x8646b46ca5ab0660!2sTravel%2024%20Nepal!5e0!3m2!1sen!2snp!4v1598167470319!5m2!1sen!2snp" width="100%" height="100%" frameborder="0" style="border: 0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

        </div>
        <div class="social">
            <div class="sub__heading">
                <h5>Follow us on</h5>

            </div>

            <ul>
                <li> <a href="#" class="fa fa-facebook" style="font-size:40px;"> </a></li>

                <li> <a href="#" class="fa fa-instagram" style="font-size:40px;"> </a>
                </li>
                <li> <a href="#" class="fa fa-youtube" style="font-size:40px;"> </a></li>
                <li> <a href="#" class="fa fa-whatsapp" style="font-size:40px;"> </a></li>



            </ul>
        </div>

    </footer>
    <div class="powered__by">
        <div>
            Copyright &copy; Travel24.com.np
        </div>
        <div>
            powered by : <a href="https://diggimarknepal.com/" class="btn text-white shadow-none" style="cursor: pointer !important">Diggimark Nepal</a>


        </div>
    </div>

    <!-- ! Bootstrap js  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>


    <script src="{{asset('/js/user/script.js')}}"></script>
    <script>
        responsiveNav();
        scrollNav();

    </script>


</body>

</html>
