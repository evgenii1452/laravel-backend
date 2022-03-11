<?php

namespace App\Http\Controllers;

use App\Models\Thing;
use Illuminate\Http\Request;

class ThingController extends Controller
{

    public function index()
    {
        return view('thing.index', [
            'things' => Thing::all()
        ]);
    }

    public function create()
    {
        return view('thing.create');
    }

    public function save(Request $request)
    {
        $validateFields = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'wrnt' => ['required', 'date'],
        ]);

        $validateFields['master'] = auth()->id();

        Thing::query()->create($validateFields);

        return redirect()->route('thing.index');
    }

    public function edit(int $id)
    {
        return view('thing.edit', ['thing' => Thing::query()->find($id)]);
    }

    public function update(int $id, Request $request)
    {
        $validateFields = $request->validate([
            'name' => ['string'],
            'description' => ['string'],
            'wrnt' => ['date'],
        ]);

        Thing::query()->find($id)->update($validateFields);

        return redirect()->route('thing.index');
    }

    public function delete(int $id)
    {
        Thing::destroy($id);

        return redirect()->back();
    }

}
