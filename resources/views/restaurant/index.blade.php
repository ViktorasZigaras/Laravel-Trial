@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Restaurant List <br>
                    <div class="flex">
                        <form action="{{route('restaurant.index')}}" method="get" class="filter-form">
                            Menus: <select name="menu_title">
                                <option value="0">Show All</option>
                                @foreach ($menus as $menu)
                                    <option value="{{$menu->title}}" @if($selectTitle == $menu->title) selected @endif>{{$menu->title}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">FILTER</button><br>
                            Sort By: 
                            Title <input type="radio" name="sort" value="title" @if('title' == $sort) checked @endif>
                            Customers <input type="radio" name="sort" value="customers" @if('customers' == $sort) checked @endif><br>
                            Emploees <input type="radio" name="sort" value="emploees" @if('emploees' == $sort) checked @endif><br>
                        </form>
                        <form action="{{route('restaurant.index')}}" method="get" class="reset-form">
                            <button type="submit" class="btn btn-primary">RESET</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($restaurantsSorted as $restaurant)
                        <div class="card-item">
                            <div class="list-text"> {{$restaurant->title}}: <br> Customers {{$restaurant->customers}} <br> Emploees {{$restaurant->emploees}} </div>
                            <div class="flex">
                                <form method="GET" action="{{route('restaurant.edit', [$restaurant])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">EDIT</button>
                                </form>
                                <form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">DELETE</button>
                                </form>
                            </div>
                            <br>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection