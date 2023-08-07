<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    public function index() {
        return view('admin.index');

    }

    public function login(Request $request) {
        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {

            return redirect()->intended(route('admin.dashboard'));
        } else {

            return redirect()->back()->with('error', 'Login Credentials Donot Match');
        }

    }

    public function logout() {
        if (Auth::user()) {
            Auth::logout();
            return redirect('/admin');

        } else {
            return redirect('/admin');

        }
    }

    public function contactForm() {
        $contact = Contact::latest()->first();

        return view('admin.contact', compact('contact'));
    }

    public function postContact(Request $request) {
        $contact          = Contact::latest()->first();
        $contact->name    = $request['name'];
        $contact->email   = $request['email'];
        $contact->phone   = $request['contactnumber'];
        $contact->address = $request['address'];
        $contact->update();

        return redirect()->back()->with('success', 'Contact Address Updated Sucessfully');

    }
    public function getMessages() {
        $messages = Message::all();
        return view('admin.messages', compact('messages'));
    }
    public function deleteMessage($id) {

        $messageToDel = Message::findOrFail($id);
        $messageToDel->delete();
        return redirect()->back()->with('success', 'Message Deleted Sucessfully');
    }

    public function gallery() {

        $gallerydir = public_path('gallery');

        $images = array_diff(scandir($gallerydir), array('.', '..'));

        return view('admin.gallery')->with("images", $images);
    }

    public function addToGallery(Request $request) {

        $this->validate($request, [
            'images'   => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg',
        ]);

        foreach ($request['images'] as $key => $value) {
            $imagename = time() . "-" . $value->getClientOriginalName();
            $value->move(public_path('gallery'), $imagename);
        }

        return redirect(route('admin.gallery'));
    }

    public function removeFromGallery(Request $request) {
        $imagepath = public_path('gallery') . "/" . $request['image'];
        unlink($imagepath);
        return redirect(route('admin.gallery'));

    }

}
