@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Restaurant List</div>
                <div class="card-body">
                    @foreach ($restaurants as $restaurant)
                        <div class="list-text"> {{$restaurant->title}}: customers {{$restaurant->customers}}, emploees {{$restaurant->emploees}} </div>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection