<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Property;
use App\Models\Option;


class PropertyController extends Controller
{

    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    public function create()
    {
        $property = new Property();
        $property->fill([
            "surface" => 40,
        ]);

        // dd(Option::pluck('name', 'id'));

        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request, Property $property)
    {
        $property->options()->sync($request->validated('options'));
        $property->create($request->validated());
        return to_route('admin.property.index')->with('success', 'Nouvelle propriété enregistrée');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            "property" => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->options()->sync($request->validated('options'));
        $property->update($request->validated());
        return to_route('admin.property.index')->with('success', 'Propriété mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', 'La propriété a été supprimée');
    }
}
