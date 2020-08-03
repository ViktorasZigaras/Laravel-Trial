<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
// use Illuminate\Http\Request;
use App\Http\Requests\RestaurantRequest;

class RestaurantController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        # $restaurant = Restaurant::orderBy('field', 'asc/desc')->get(); + multiple order bys for more sorting
        # $restaurant = Restaurant::all()->sortBy/Desc('field');
        return view('restaurant.index', ['restaurants' => Restaurant::all()->sortBy('title')]);
    }

    public function create() {
        return view('restaurant.create');
    }

    public function store(RestaurantRequest $request) {
        Restaurant::create($request->all());
        return redirect()->route('restaurant.index')->with('success_message', 'Restaurant Created.');
    }

    // public function show(Restaurant $restaurant) {}

    public function edit(Restaurant $restaurant) {
        return view('restaurant.edit', ['restaurant' => $restaurant]);
    }

    public function update(RestaurantRequest $request, Restaurant $restaurant) {
        $restaurant->fill($request->all())->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Restaurant Updated.');
    }

    public function destroy(Restaurant $restaurant) {
        if ($restaurant->menus->count()) {
            return redirect()->back()->with('info_message', 'Restaurant Has Menus.');
        }
        $restaurant->delete();
        return redirect()->back()->with('success_message', 'Restaurant Deleted.');
    }
}