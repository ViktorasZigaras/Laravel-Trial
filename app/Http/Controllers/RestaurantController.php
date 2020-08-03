<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\RestaurantRequest;

class RestaurantController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $menus = Menu::all()->unique('title')->sortBy('title');
        $selectTitle = '';
        $sort = '';
        $restaurantsSorted = [];

        if ($request->menu_title) {
            $restaurants = Restaurant::all();
            foreach ($restaurants as $restaurant) {
                foreach ($restaurant->menus as $menu) {
                    if ($menu['title'] === $request->menu_title) {
                        $restaurantsSorted[] = $restaurant;
                    }
                }
            }
            if ($request->sort) {
                if ($request->sort === 'title') {
                    uasort($restaurantsSorted, function($a, $b) {
                        return $a->title <=> $b->title;
                    });
                    $sort = 'title';
                } elseif ($request->sort === 'customers') {
                    uasort($restaurantsSorted, function($a, $b) {
                        return $a->customers <=> $b->customers;
                    });
                    $sort = 'customers';
                } elseif ($request->sort === 'emploees') {
                    uasort($restaurantsSorted, function($a, $b) {
                        return $a->emploees <=> $b->emploees;
                    });
                    $sort = 'emploees';
                }
            }
            $selectTitle = $request->menu_title;
        } else {
            if ($request->sort) {
                if ($request->sort === 'title') {
                    $restaurantsSorted = Restaurant::orderBy('title')->get();
                    $sort = 'title';
                } elseif ($request->sort === 'customers') {
                    $restaurantsSorted = Restaurant::orderBy('customers')->get();
                    $sort = 'customers';
                } elseif ($request->sort === 'emploees') {
                    $restaurantsSorted = Restaurant::orderBy('emploees')->get();
                    $sort = 'emploees';
                } else {
                    $restaurantsSorted = Restaurant::all();
                }
            } else {
                $restaurantsSorted = Restaurant::all();
            }
        }

        return view('restaurant.index', compact('menus', 'restaurantsSorted', 'selectTitle', 'sort'));
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