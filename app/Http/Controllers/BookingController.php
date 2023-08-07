<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
class BookingController extends Controller
{
    //

    public function pendingBook()
    {
        $bookings=Booking::where('status','pending')->get();

        return view('admin.booking',compact('bookings'));
    }

    public function confirmBooking($id)
    {
        $bookingConfirm=Booking::findOrFail($id);
         $bookingConfirm->status='confirmed';
         $bookingConfirm->update();
         return redirect()->back()->with('success','Booking Has Confirmed');

    }
    public function confirmedBook()
    {

        $bookings=Booking::where('status','confirmed')->get();

        return view('admin.booking',compact('bookings'));
    }

    public function cancelBooking($id)
    {
        $bookingCancel=Booking::findOrFail($id);
       
        $bookingCancel->delete();
        return redirect()->back()->with('success','Booking Has Been Deleted :(');

    }

    public function completeBooking($id)
    {
        $competeBook=Booking::findOrFail($id);
        $competeBook->status='completed';
        $competeBook->update();
        return redirect()->back()->with('success','Wow!! Congrats For Completion OF Booking');

    }

    public function completedBook()
    {
        $bookings=Booking::where('status','completed')->get();

        return view('admin.booking',compact('bookings'));

    }
}
