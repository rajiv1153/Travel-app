<?php

namespace App\Http\Middleware;

use App\Activity;
use App\Contact;
use App\Country;
use App\Testimonial;
use Closure;

class CacheControl {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $countries    = Country::orderBy('countryName')->get();
        $contact      = Contact::latest()->first();
        $activities   = Activity::latest()->get();
        $testimonials = Testimonial::latest()->get();

        \View::share(compact('countries', 'contact', 'activities', 'testimonials'));
        $response = $next($request);
        return $response->header('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sun, 02 Jan 1990 00:00:00 GMT');
    }
}
