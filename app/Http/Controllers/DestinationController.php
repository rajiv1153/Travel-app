<?php

namespace App\Http\Controllers;

use App\Country;
use App\CountryDestination;
use Illuminate\Http\Request;

class DestinationController extends Controller {

    public function allDestinations() {

        return view('admin.alldestinations');
    }

    public function addDestination(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $imageName   = time() . $request['image']->getClientOriginalName();
        $countryName = $request['countryName'];
        $slug        = $this->slugify($request['countryName']);
        Country::create(

            ['countryname' => $countryName,
                'imagename'    => $imageName,
                'slug'         => $slug,
            ]
        );
        request()->image->move(public_path('countryimage'), $imageName);
        return back()->with('success', 'Country Added successfully.');

    }
    public function editDestination(Request $request) {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);
        $country = Country::findOrFail($request['id']);
        if ($request['image'] != null) {
            //remove old image
            $oldImage = $country->imagename;
            unlink(public_path() . '/' . 'countryimage/' . $oldImage);
            //add new image
            $imageName = time() . $request['image']->getClientOriginalName();
            request()->image->move(public_path('countryimage'), $imageName);
            $country->imagename = $imageName;

        }
        $country->countryname = $request['countryName'];
        $country->update();
        return redirect()->back()->with('success', 'Country Details Edited Sucessfully');
    }

    public function deleteDestination($id) {
        $country = Country::findOrFail($id);
        $country->delete();
        unlink(public_path() . '/' . 'countryimage/' . $country->imagename);

        return redirect()->back()->with('success', 'Country Deleted SUcessfully');

    }

    public function getCountryDest($id) {
        $country      = Country::findOrFail($id);
        $countryDests = $country->countrydestinations()->orderBy('title')->get();

        return view('admin.countrybaseddest', compact('country', 'countryDests'));
    }
    public function addCountryDest($id) {
        $country = Country::findOrFail($id);
        return view('admin.destinationform', compact('country'));

    }

    public function postCountryDest($id, Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $country                              = Country::findOrFail($id);
        $countryDestination                   = new CountryDestination;
        $countryDestination->title            = $request['title'];
        $countryDestination->duration         = $request['duration'];
        $countryDestination->difficulty       = $request['gridRadios'];
        $countryDestination->price            = $request['price'];
        $countryDestination->tripintroduction = $request['introduction'];
        $countryDestination->slug             = $this->slugify($request['title']);

        $allHighlight = "";

        foreach ($request['highlight'] as $highlight) {

            $allHighlight = $highlight . ':?:' . $allHighlight;
        }

        $countryDestination->highlights = $allHighlight;
        $imageName                      = time() . $request['image']->getClientOriginalName();
        $countryDestination->imagename  = $imageName;
        request()->image->move(public_path('countrydestimage'), $imageName);
        $country->countrydestinations()->save($countryDestination);
        return redirect()->back()->with('success', 'New Destinaion Added SUcessfully');

    }

    public function deleteCountryDest($id) {
        $deleteDest = CountryDestination::findOrFail($id);
        $deleteDest->delete();
        unlink(public_path() . '/' . 'countrydestimage/' . $deleteDest->imagename);
        return redirect()->back()->with('success', 'Destination Deleted Sucessfully');

    }
    //
    public function infoCountryDest($id) {
        $countryDest = CountryDestination::findOrfail($id);

        return view('admin.destinationinfo', compact('countryDest'));
    }

    public function addTopDest($id) {
        $countryDest          = CountryDestination::findOrFail($id);
        $countryDest->topdest = 1;
        $countryDest->update();
        return redirect()->back()->with('success', 'Destination Added To Top Destination Sucessfully');
    }

    public function removeTopDest($id) {
        $countryDest          = CountryDestination::findOrFail($id);
        $countryDest->topdest = 0;
        $countryDest->update();
        return redirect()->back()->with('success', 'Destination Removed From Top Destination Sucessfully');

    }

    public function addFrontDest($id) {

        $countryDest            = CountryDestination::findOrFail($id);
        $countryDest->frontdest = 1;
        $countryDest->update();
        return redirect()->back()->with('success', 'Destination Added To Front Destination Sucessfully');
    }

    public function removeFrontDest($id) {

        $countryDest            = CountryDestination::findOrFail($id);
        $countryDest->frontdest = 0;
        $countryDest->update();
        return redirect()->back()->with('success', 'Destination Removed From Front Destination Sucessfully');

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

    public function edit($id, $destid) {
        $country = Country::findOrFail($id);
        $dest    = CountryDestination::findOrFail($destid);
        return view('admin.editdestination', compact('dest', 'country'));
    }

    public function update(Request $request, $destid, $cid) {

        $dest = CountryDestination::findOrFail($destid);

        $dest->title            = $request['title'];
        $dest->duration         = $request['duration'];
        $dest->difficulty       = $request['gridRadios'];
        $dest->price            = $request['price'];
        $dest->tripintroduction = $request['introduction'];
        $dest->slug             = $this->slugify($request['title']);
        $allHighlight           = "";
        foreach ($request['highlight'] as $highlight) {
            $allHighlight = $highlight . ':?:' . $allHighlight;
        }
        $dest->highlights = $allHighlight;

        if ($request->has('image')) {
            $image_name = time() . $request->image->getClientOriginalName();
            request()->image->move(public_path("countrydestimage"), $image_name);
            unlink(public_path() . '/' . 'countrydestimage/' . $dest->imagename);
            $dest->imagename = $image_name;
        }
        $dest->save();

        return redirect(route('destination.getcountries', $cid));
    }

}
