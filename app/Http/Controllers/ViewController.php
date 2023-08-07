<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Booking;
use App\Country;
use App\CountryDestination;
use App\Message;
use Illuminate\Http\Request;

class ViewController extends Controller {
    //

    public function index() {
        $topDest   = CountryDestination::where('topdest', 1)->get();
        $frontDest = CountryDestination::where('frontdest', 1)->get();
        return view('user.index', compact('topDest', 'frontDest'));
    }
    public function contactUs() {
        return view('user.contact');
    }
    public function package($slug) {
        $country     = Country::where('slug', $slug)->get()[0];
        $packageDest = $country->countrydestinations()->get();
        return view('user.packages', compact('packageDest', 'country'));
    }

    public function destination($slug) {
        $destination = CountryDestination::where('slug', $slug)->get()[0];
        return view('user.destination', compact('destination'));
    }

    public function booking($id, Request $request) {
        $destination               = CountryDestination::findOrFail($id);
        $newBooking                = new Booking;
        $newBooking->bookeddate    = $request['date'];
        $newBooking->nop           = $request['people'];
        $newBooking->bookedname    = $request['fullname'];
        $newBooking->bookedemail   = $request['email'];
        $newBooking->bookedphone   = $request['contactNumber'];
        $newBooking->message       = $request['message'];
        $newBooking->bookedcountry = $request['country'];
        $destination->bookings()->save($newBooking);
        return redirect()->back()->with('success', 'Your Booking is Placed !! We will Contact You Soon !! Thanku For Choosing Travel24');
    }
    public function postMessage(Request $request) {
        Message::create(

            [
                'name'    => $request['fullname'],
                'address' => $request['address'],
                'email'   => $request['email'],
                'phone'   => $request['contactnumber'],
                'message' => $request['message'],

            ]

        );
        return redirect()->back()->with('success', 'Thank You For Your Message!! We will Consider It Soon!! :)');

    }

    public function gallery(Request $request) {

        $gallerydir = public_path('gallery');

        $images = array_diff(scandir($gallerydir), array('.', '..'));

        return view('user.gallery')->with("images", $images);
    }

    public function activities(Request $request) {

        return view('user.activities');
    }

    public function viewActivity(Request $request) {

        $activity = Activity::where('slug', $request['slug'])->get()[0];

        return view('user.activity', compact('activity'));
    }

}
