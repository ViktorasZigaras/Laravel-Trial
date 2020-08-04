<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\RestaurantRequest;
use App\Services\RestaurantService;

class RestaurantController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(RestaurantService $service, Request $request) {
        return view('restaurant.index', $service->filterRestaurants($request));
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