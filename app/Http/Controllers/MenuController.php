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
        // $authors = Author::all();
        // $selectId = 0;
        // $sort = '';

        // $products = [];
        // $category = Category::where('id', $request->category)->first();
        // $productss = $category->products->toArray();
        // foreach ($productss as $products_) {
        //     $products[] = Product::where('id', $products_['product_id'])->first();
        // }

        // if ($request->author_id) {
        //     if ($request->sort) {
        //         if ($request->sort === 'title') {
        //             $books = Book::where('author_id', $request->author_id)->orderBy('title')->get();
        //             $sort = 'title';
        //         } elseif ($request->sort === 'isbn') {
        //             $books = Book::where('author_id', $request->author_id)->orderBy('isbn')->get();
        //             $sort = 'isbn';
        //         } else {
        //             $books = Book::all();
        //         }
        //     } else {
        //         $books = Book::where('author_id', $request->author_id)->get();
        //     }
        //     $selectId = $request->author_id;
        // } else {
        //     if ($request->sort) {
        //         if ($request->sort === 'title') {
        //             $books = Book::orderBy('title')->get();
        //             $sort = 'title';
        //         } elseif ($request->sort === 'isbn') {
        //             $books = Book::orderBy('isbn')->get();
        //             $sort = 'isbn';
        //         } else {
        //             $books = Book::all();
        //         }
        //     } else {
        //         $books = Book::all();
        //     }
        // }

        // return view('menu.index', compact('books', 'restaurants', 'selectId', 'sort'));
    }

    public function create() {
        return view('menu.create', ['restaurants' => Restaurant::all()->sortBy('name')]);
    }

    public function store(MenuRequest $request) {
        Menu::create($request->all());
        return redirect()->route('menu.index')->with('success_message', 'Book Created.');
    }

    // public function show(Menu $menu) {}

    public function edit(Menu $menu) {
        // return view('menu.edit', ['menu' => $menu, 'restaurants' => Restaurant::all()]);
    }

    public function update(MenuRequest $request, Menu $menu) {
    //     $menu->fill($request->all())->save();
    //     return redirect()->route('menu.index')->with('success_message', 'Menu Updated.');
    }

    public function destroy(Menu $menu) {
        // $menu->delete();
        // return redirect()->route('menu.index')->with('success_message', 'Menu Deleted.');
    }
}