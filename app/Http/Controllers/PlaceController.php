<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    public function index()
    {
        return view('place.index', [
            'places' => Place::all()
        ]);
    }

    public function create()
    {
        return view('place.create');
    }

    public function save(Request $request)
    {
        $validateFields = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'repair' => ['required', 'string'],
            'work' => ['required', 'bool'],
        ]);

        Place::query()->create($validateFields);

        return redirect()->route('place.index');
    }

    public function edit(int $id)
    {
        return view('place.edit', ['place' => Place::query()->find($id)]);
    }

    public function update(int $id, Request $request)
    {
        $validateFields = $request->validate([
            'name' => ['string'],
            'description' => ['string'],
            'repair' => ['string'],
            'work' => ['bool']
        ]);

        Place::query()->find($id)->update($validateFields);

        return redirect()->route('place.index');
    }

    public function delete(int $id)
    {
        Place::destroy($id);

        return redirect()->back();
    }
}
