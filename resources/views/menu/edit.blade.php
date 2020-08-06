@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Menu</div>
                <div class="card-body">
                    <form method="POST" action="{{route('menu.update',[$menu])}}" id="form">

                        <div class="form-group">
                           <label>Title</label>
                           <input type="text" name="title" value="{{old('title',$menu->title)}}" class="form-control">
                           <small class="form-text text-muted">Menu Title</small>
                        </div>

                        <div class="form-group">
                           <label>Price</label>
                           <input type="text" name="price" value="{{old('price',$menu->price)}}" class="form-control">
                           <small class="form-text text-muted">Menu Price</small>
                        </div>

                        <div class="form-group">
                           <label>Weight</label>
                           <input type="text" name="weight" value="{{old('weight',$menu->weight)}}" class="form-control">
                           <small class="form-text text-muted">Menu Total Weight</small>
                        </div>

                        <div class="form-group">
                           <label>Meat</label>
                           <input type="text" name="meat" value="{{old('meat',$menu->meat)}}" class="form-control">
                           <small class="form-text text-muted">Meat Weight</small>
                        </div>

                        <div class="form-group">
                           <label>About</label>
                           <input type="hidden" name="about" value="{{old('about',$menu->about)}}">
                           <div id="editor"></div>
                           <small class="form-text text-muted">Menu Summary</small>
                        </div>

                        <select name="restaurant_id">
                            @foreach ($restaurants as $restaurant)
                                <option value="{{$restaurant->id}}" @if($restaurant->id == $menu->restaurant_id) selected @endif>
                                    {{$restaurant->title}}
                                </option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit" class="btn btn-primary">EDIT</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// {{$menu->about}}
    var quill = new Quill('#editor', {theme: 'snow'});
    const input = document.querySelector('input[name=about]');
    // if (input.value !== '') quill.setContents(JSON.parse(input.value), 'api');
    // if (input.value !== '') quill.setContents(input.value, 'api');
    quill.clipboard.dangerouslyPasteHTML(0, input.value);
    document.querySelector('#form').onsubmit = () => {
       // input.value = JSON.stringify(quill.getContents());
       input.value = quill.root.innerHTML;
       // input.value = quill.container.innerHTML;
       // console.log(quill.getContents());
    };
</script>
@endsection