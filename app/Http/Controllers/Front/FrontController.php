<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Location;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function selectUser()
    {
        return view('front.select-user');
    }

    public function pricing()
    {
        $packages = Package::orderBy('id')->get();
        return view('front.pricing', compact('packages'));
    }

    public function locations()
    {
        $locations = Location::orderBy('id')->get();
        return view('front.locations', compact('locations'));
    }
}
