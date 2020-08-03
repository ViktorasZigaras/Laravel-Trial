@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Menu List <br>
                    <div class="flex">
                        <form action="{{route('menu.index')}}" method="get" class="filter-form">
                            Restaurants: <select name="restaurant_id">
                                <option value="0">Show All</option>
                                @foreach ($restaurants as $restaurant)
                                    <option value="{{$restaurant->id}}" @if($selectId == $restaurant->id) selected @endif>{{$restaurant->title}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">FILTER</button><br>
                            Sort By: 
                            Title <input type="radio" name="sort" value="title" @if('title' == $sort) checked @endif>
                            Price <input type="radio" name="sort" value="price" @if('price' == $sort) checked @endif><br>
                            Weight <input type="radio" name="sort" value="weight" @if('weight' == $sort) checked @endif>
                            Meat content <input type="radio" name="sort" value="meat" @if('meat' == $sort) checked @endif><br>
                        </form>
                        <form action="{{route('menu.index')}}" method="get" class="reset-form">
                            <button type="submit" class="btn btn-primary">RESET</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($menus as $menu)

                        <div class="list-text"> {{$menu->title}} </div>
                        <div class="list-text"> {{$menu->restaurant->title}} </div>
                        <small class="text-muted"> Price: {{$menu->price}} </small><br>
                        <small class="text-muted"> Weight: {{$menu->weight}} </small><br>
                        <small class="text-muted"> Meat content: {{$menu->meat}} </small><br>
                        <small class="text-muted"> About: {{$menu->about}} </small><br>
                        <div class="flex">
                            <form method="GET" action="{{route('menu.edit', [$menu])}}">
                                @csrf
                                <button type="submit" class="btn btn-primary">EDIT</button>
                            </form>
                            <form method="POST" action="{{route('menu.destroy', [$menu])}}">
                                @csrf
                                <button type="submit" class="btn btn-primary">DELETE</button>
                            </form>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection