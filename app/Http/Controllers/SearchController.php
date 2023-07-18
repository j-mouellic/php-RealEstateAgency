<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;

class SearchController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query();
        if ($request->validated('price')) {
            $query = $query->where("price", "<=", $request->validated('price'));
        }
        if ($request->validated('surface')) {
            $query = $query->where("surface", ">=", $request->validated('surface'));
        }
        if ($request->validated('rooms')) {
            $query = $query->where("rooms", ">=", $request->validated('rooms'));
        }
        if ($request->validated('title')) {
            $query = $query->where("title", "like", "%{$request->validated('title')}%");
        }
        return view('index', [
            "properties" => $query->paginate(16),
            "input" => $request->validated(),
        ]);
    }

    public function show(Property $property)
    {

    }
}