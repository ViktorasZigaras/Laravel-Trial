<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Services\MenuService;

class MenuController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(MenuService $service, Request $request) {
        return view('menu.index', $service->filterMenus($request));
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