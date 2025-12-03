<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('id')->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'allowed_days' => 'required|numeric',
            'allowed_properties' => 'required|numeric',
            'allowed_f_properties' => 'required|numeric',
            'allowed_photos' => 'required|numeric',
            'allowed_videos' => 'required|numeric'
        ]);

        $package = new Package();
        $package->name = $request->name;
        $package->price = $request->price;
        $package->allowed_days = $request->allowed_days;
        $package->allowed_properties = $request->allowed_properties;
        $package->allowed_f_properties = $request->allowed_f_properties;
        $package->allowed_photos = $request->allowed_photos;
        $package->allowed_videos = $request->allowed_videos;
        $package->save();

        return redirect()->route('admin.package.index')->with('success', 'Package Created Successly.');
    }

    public function edit($id)
    {
        $package = Package::where('id', $id)->first();
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'allowed_days' => 'required|numeric',
            'allowed_properties' => 'required|numeric',
            'allowed_f_properties' => 'required|numeric',
            'allowed_photos' => 'required|numeric',
            'allowed_videos' => 'required|numeric'
        ]);

        $package = Package::where('id', $id)->first();
        $package->name = $request->name;
        $package->price = $request->price;
        $package->allowed_days = $request->allowed_days;
        $package->allowed_properties = $request->allowed_properties;
        $package->allowed_f_properties = $request->allowed_f_properties;
        $package->allowed_photos = $request->allowed_photos;
        $package->allowed_videos = $request->allowed_videos;
        $package->update();

        return redirect()->route('admin.package.index')->with('success', 'Package Updated Successly.');
    }

    public function delete($id)
    {
        $package = Package::where('id', $id)->first();

        // Simple Delete
        // $package->delete();
        // return redirect()->route('admin.package.index')->with('success', 'Package Deleted Successfully.');

        if ($package){
            $package->delete();
            return redirect()->route('admin.package.index')->with('success', 'Package Deleted Successfully.');
        } else {
            return redirect()->route('admin.package.index')->with('error', 'Package Not Found.');
        }
    }
}