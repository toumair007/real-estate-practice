<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    public function index()
    {
        $propertyTypes = PropertyType::orderBy('id')->get();
        return view('admin.type.index', compact('propertyTypes'));
    }

    public function create()
    {
        return view('admin.type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:property_types,name']
        ]);

        $propertyType = new PropertyType();
        $propertyType->name = $request->name;
        $propertyType->save();

        return redirect()->route('admin.type.index')->with('success', 'Type Created Successly.');
    }

    public function edit($id)
    {
        $propertyType = PropertyType::where('id', $id)->first();
        return view('admin.type.edit', compact('propertyType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required','unique:property_types,name,'.$id]
        ]);

        $propertyType = PropertyType::where('id', $id)->first();

        $propertyType->name = $request->name;
        $propertyType->update();

        return redirect()->route('admin.type.index')->with('success', 'Type Updated Successly.');
    }

    public function delete($id)
    {
        $propertyType = PropertyType::where('id', $id)->first();

        // Simple Delete
        // $package->delete();
        // return redirect()->route('admin.package.index')->with('success', 'Package Deleted Successfully.');

        if ($propertyType){
            $propertyType->delete();
            return redirect()->route('admin.type.index')->with('success', 'Type Deleted Successfully.');
        } else {
            return redirect()->route('admin.type.index')->with('error', 'Type Not Found.');
        }
    }
}
