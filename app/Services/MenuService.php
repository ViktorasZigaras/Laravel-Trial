<?php

namespace App\Services;

use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuService
{
    public function filterMenus(Request $request)
    {
        $restaurants = Restaurant::all()->sortBy('title');
        $selectId = 0;
        $sort = '';
        if ($request->restaurant_id) {
            if ($request->sort) {
                if ($request->sort === 'title') {
                    $menus = Menu::where('restaurant_id', $request->restaurant_id)->orderBy('title')->get();
                    $sort = 'title';
                } elseif ($request->sort === 'price') {
                    $menus = Menu::where('restaurant_id', $request->restaurant_id)->orderBy('price')->get();
                    $sort = 'price';
                } elseif ($request->sort === 'weight') {
                    $menus = Menu::where('restaurant_id', $request->restaurant_id)->orderBy('weight')->get();
                    $sort = 'weight';
                } elseif ($request->sort === 'meat') {
                    $menus = Menu::where('restaurant_id', $request->restaurant_id)->orderBy('meat')->get();
                    $sort = 'meat';
                } else {
                    $menus = Menu::all();
                }
            } else {
                $menus = Menu::where('restaurant_id', $request->restaurant_id)->get();
            }
            $selectId = $request->restaurant_id;
        } else {
            if ($request->sort) {
                if ($request->sort === 'title') {
                    $menus = Menu::orderBy('title')->get();
                    $sort = 'title';
                } elseif ($request->sort === 'price') {
                    $menus = Menu::orderBy('price')->get();
                    $sort = 'price';
                } elseif ($request->sort === 'weight') {
                    $menus = Menu::orderBy('weight')->get();
                    $sort = 'weight';
                } elseif ($request->sort === 'meat') {
                    $menus = Menu::orderBy('meat')->get();
                    $sort = 'meat';
                } else {
                    $menus = Menu::all();
                }
            } else {
                $menus = Menu::all();
            }
        }

        return compact('menus', 'restaurants', 'selectId', 'sort');
    }
}