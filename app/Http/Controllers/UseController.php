<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Thing;
use App\Models\UseModel;
use App\Models\User;
use Illuminate\Http\Request;

class UseController extends Controller
{

    public function index()
    {
        return view('use.index', [
            'uses' => UseModel::all()
        ]);
    }

    public function create()
    {
        $things = Thing::query()->where('master', auth()->id())->get();
        $places = Place::all();
        $users = User::all();

        return view('use.create', [
            'things' => $things,
            'places' => $places,
            'users' => $users,
        ]);
    }

    public function save(Request $request)
    {
        $validateFields = $request->validate([
            'thing_id' => ['required', 'integer'],
            'place_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'amount' => ['required', 'integer'],
        ]);

        UseModel::query()->create($validateFields);

        return redirect()->route('use.index');
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
        UseModel::destroy($id);

        return redirect()->back();
    }

}
