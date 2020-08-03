@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Menu</div>
                <div class="card-body">
                    <form method="POST" action="{{route('menu.store')}}" id="form">

                        <div class="form-group">
                           <label>Title</label>
                           <input type="text" name="title" value="{{old('title')}}" class="form-control">
                           <small class="form-text text-muted">Menu Title</small>
                        </div>

                        <div class="form-group">
                           <label>Price</label>
                           <input type="text" name="price" value="{{old('price')}}" class="form-control">
                           <small class="form-text text-muted">Menu Price</small>
                        </div>

                        <div class="form-group">
                           <label>Weight</label>
                           <input type="text" name="weight" value="{{old('weight')}}" class="form-control">
                           <small class="form-text text-muted">Menu Total Weight</small>
                        </div>

                        <div class="form-group">
                           <label>Meat</label>
                           <input type="text" name="meat" value="{{old('meat')}}" class="form-control">
                           <small class="form-text text-muted">Meat Weight</small>
                        </div>

                        <div class="form-group">
                           <label>About</label>
                           <input type="hidden" name="about" value="{{old('about')}}">
                           <div id="editor"></div>
                           <small class="form-text text-muted">Menu Summary</small>
                        </div>

                        <select name="restaurant_id">
                            @foreach ($restaurants as $restaurant)
                               <option value="{{$restaurant->id}}">{{$restaurant->title}}</option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var quill = new Quill('#editor', {theme: 'snow'});
    const input = document.querySelector('input[name=about]');
    if (input && input.value !== '') quill.setContents(JSON.parse(input.value), 'api');
    document.querySelector('#form').onsubmit = () => {
       input.value = JSON.stringify(quill.getContents());
    };
</script>
@endsection