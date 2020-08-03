<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
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

        return view('menu.index', compact('menus', 'restaurants', 'selectId', 'sort'));
    }

    public function create() {
        return view('menu.create', ['restaurants' => Restaurant::all()->sortBy('title')]);
    }

    public function store(MenuRequest $request) {
        Menu::create($request->all());
        return redirect()->route('menu.index')->with('success_message', 'Book Created.');
    }

    // public function show(Menu $menu) {}

    public function edit(Menu $menu) {
        return view('menu.edit', ['menu' => $menu, 'restaurants' => Restaurant::all()]);
    }

    public function update(MenuRequest $request, Menu $menu) {
        $menu->fill($request->all())->save();
        return redirect()->route('menu.index')->with('success_message', 'Menu Updated.');
    }

    public function destroy(Menu $menu) {
        $menu->delete();
        return redirect()->route('menu.index')->with('success_message', 'Menu Deleted.');
    }
}