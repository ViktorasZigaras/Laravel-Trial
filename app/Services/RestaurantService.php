<?php

namespace App\Services;

use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Http\Request;

class RestaurantService
{
    public function filterRestaurants(Request $request)
    {
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

        return compact('menus', 'restaurantsSorted', 'selectTitle', 'sort');
    }
}