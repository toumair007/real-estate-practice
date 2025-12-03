<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class AdminLocationController extends Controller
{
    public function index()
    {
        $locations = Location::orderBy('id')->get();
        return view('admin.location.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.location.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:locations,name'],
            'slug' => ['required','unique:locations,slug', 'regex:/^[A-Za-z0-9]+(?:-[A-Za-z0-9]+)*$/'],
            'photo' => 'required|image|mimes:jpeg,jpg,png,svg,webp|max:2048',
        ]);
                
        $filename = 'location_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads/location'), $filename);

        $location = new Location();
        $location->name = $request->name;
        $location->slug = strtolower($request->slug);
        $location->photo = $filename;
        $location->save();

        return redirect()->route('admin.location.index')->with('success', 'Location Created Successly.');
    }

    public function edit($id)
    {
        $location = Location::where('id', $id)->first();
        return view('admin.location.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required','unique:locations,name,'.$id],
            'slug' => ['required','unique:locations,slug,'.$id, 'regex:/^[A-Za-z0-9]+(?:-[A-Za-z0-9]+)*$/'],
        ]);

        $location = Location::where('id', $id)->first();
        
        if($request->photo){
            $request->validate([
                'photo' => 'image|mimes:jpeg,jpg,png,svg,webp|max:2048',
            ]);
            $filename = 'location_'.time().'.'.$request->photo->extension();
            if($location->photo != ''){
                unlink(public_path('uploads/location/'.$location->photo));
            }
            $request->photo->move(public_path('uploads/location'), $filename);
            $location->photo = $filename;
        }

        $location->name = $request->name;
        $location->slug = strtolower($request->slug);
        $location->update();

        return redirect()->route('admin.location.index')->with('success', 'Location Updated Successly.');
    }

    public function delete($id)
    {
        $location = Location::where('id', $id)->first();

        // Simple Delete
        // $package->delete();
        // return redirect()->route('admin.package.index')->with('success', 'Package Deleted Successfully.');

        if ($location){
            if($location->photo != ''){
                unlink(public_path('uploads/location/'.$location->photo));
            }
            $location->delete();
            return redirect()->route('admin.location.index')->with('success', 'Location Deleted Successfully.');
        } else {
            return redirect()->route('admin.location.index')->with('error', 'Location Not Found.');
        }
    }
}
