<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $activities = Activity::get();
        return view('admin.activities')->with('activities', $activities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.addactivity');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title'   => 'required',
            'price'   => 'required',
            'content' => 'required',
            'image'   => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $request['slug'] = $this->slugify($request['title']);

        if (count(Activity::where('slug', $request['slug'])->get()) != 0) {
            return redirect()->back()->with('titleerror', "Title Already exist in System");
        }

        $image_name = time() . request()->image->getClientOriginalName();

        Activity::create([
            'title'      => $request['title'],
            'slug'       => $request['slug'],
            'content'    => $request['content'],
            'price'      => $request['price'],
            'image_name' => $image_name,
        ]);
        request()->image->move(public_path('activityimage'), $image_name);
        return redirect(route('admin.activities'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity) {
        return view('admin.editactivity')->with('activity', $activity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity) {

        $request['slug'] = $this->slugify($request['title']);

        $activity->title   = $request->title;
        $activity->slug    = $request->slug;
        $activity->content = $request->content;
        $activity->price   = $request->price;

        if ($request->has('image')) {
            $image_name = time() . $request->image->getClientOriginalName();
            request()->image->move(public_path("activityimage"), $image_name);
            unlink(public_path() . '/' . 'activityimage/' . $activity->imagename);
            $activity->imagename = $image_name;
        }

        $activity->save();
        return redirect(route('admin.activities'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $activity  = Activity::findOrFail($request['id']);
        $imagepath = public_path('activityimage') . "/" . $activity->image_name;
        unlink($imagepath);
        $activity->delete();
        return redirect()->back();
    }

    public function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

}
