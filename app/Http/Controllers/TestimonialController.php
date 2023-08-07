<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials')->with('testimonials', $testimonials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.addtestimonial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name'      => 'required',
            'rating'    => 'required|digits:1|digits_between:0,5x',
            'testiment' => 'required',
            'country'   => 'required',
            'image'     => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $image_name = time() . $request->image->getClientOriginalName();

        Testimonial::create([
            'name'       => $request['name'],
            'rating'     => $request['rating'],
            'testiment'  => $request['testiment'],
            'country'    => $request['country'],
            'image_name' => $image_name,
        ]);
        request()->image->move(public_path('testimonialimage'), $image_name);

        return redirect(route('admin.testimonials'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testiment) {
        return view('admin.edittestiment')->with('testiment', $testiment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testiment) {

        $testiment->name      = $request->name;
        $testiment->country   = $request->country;
        $testiment->rating    = $request->rating;
        $testiment->testiment = $testiment->testiment;

        $testiment->save();

        return redirect(route("admin.testimonials"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        Testimonial::findOrFail($request['id'])->delete();
        return redirect()->back();
    }
}
