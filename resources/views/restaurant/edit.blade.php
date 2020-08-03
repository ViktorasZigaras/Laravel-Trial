@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Restaurant</div>
                <div class="card-body">
                    <form method="POST" action="{{route('restaurant.update',[$restaurant])}}">

                        <div class="form-group">
                           <label>Title</label>
                           <input type="text" name="title" value="{{old('title',$restaurant->title)}}" class="form-control">
                           <small class="form-text text-muted">Restaurant Title</small>
                        </div>

                        <div class="form-group">
                           <label>Customers</label>
                           <input type="text" name="customers" value="{{old('customers',$restaurant->customers)}}" class="form-control">
                           <small class="form-text text-muted">Customer Amount</small>
                        </div>

                        <div class="form-group">
                           <label>Emploees</label>
                           <input type="text" name="emploees" value="{{old('emploees',$restaurant->emploees)}}" class="form-control">
                           <small class="form-text text-muted">Emploee Amount</small>
                        </div>

                        @csrf
                        <button type="submit" class="btn btn-primary">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection