<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::orderBy('id')->get();
        return view('admin.amenity.index', compact('amenities'));
    }

    public function create()
    {
        return view('admin.amenity.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:amenities,name']
        ]);

        $amenity = new Amenity();
        $amenity->name = $request->name;
        $amenity->save();

        return redirect()->route('admin.amenity.index')->with('success', 'Amenity Created Successly.');
    }

    public function edit($id)
    {
        $amenity = Amenity::where('id', $id)->first();
        return view('admin.amenity.edit', compact('amenity'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required','unique:amenities,name,'.$id]
        ]);

        $amenity = Amenity::where('id', $id)->first();

        $amenity->name = $request->name;
        $amenity->update();

        return redirect()->route('admin.amenity.index')->with('success', 'Amenity Updated Successly.');
    }

    public function delete($id)
    {
        $amenity = Amenity::where('id', $id)->first();

        // Simple Delete
        // $package->delete();
        // return redirect()->route('admin.package.index')->with('success', 'Package Deleted Successfully.');

        if ($amenity){
            $amenity->delete();
            return redirect()->route('admin.amenity.index')->with('success', 'Amenity Deleted Successfully.');
        } else {
            return redirect()->route('admin.amenity.index')->with('error', 'Amenity Not Found.');
        }
    }
}
