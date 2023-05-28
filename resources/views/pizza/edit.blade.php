@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">

        
        {{-- menu form --}}
            
        

        {{-- pizza form  --}}
        
        <div class="col-md-8">
            @if(count($errors)>0)
            <div class="card mt-5">
                <div class="card-body">
                    <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
            <div class="card">
                <div class="card-header">{{ __('Pizza') }}</div>
                <form action="{{route('pizza.update', $pizza->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Pizza Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter the pizza" value="{{$pizza->name}}">
                    </div>
                    <div class="form-group" style="padding-top: 10px">
                        <label for="description">Description of pizza</label>
                        <textarea class="form-control" name="description" placeholder="Describe the pizza here" value="{{$pizza->description}}"></textarea>
                    </div>
                    <div class="form-inline" style="padding-top: 10px">
                        <label for="price">Pizza Price (£)</label>
                        <div class="input-group">
                            <input type="number" name="small_price" class="form-control" placeholder="small pizza price" value="{{$pizza->small_price}}">
                            <input type="number" name="medium_price" class="form-control" placeholder="medium pizza price" value="{{$pizza->medium_price}}">
                            <input type="number" name="large_price" class="form-control" placeholder="large pizza price" value="{{$pizza->large_price}}">
                        </div>
                    </div>
                    <div class="form-group" style="padding-top: 10px">
                        <label for="category">Category of pizza</label>
                        <select name="category" id="" class="form-control" value="{{$pizza->category}}"
                            <option value="">select option...</option>
                            <option value="vegetarian">vegetarian</option>          
                            <option value="non-vegetarian">non-vegetarian</option>
                            <option value="traditional">traditional</option>
                        </select>
                    </div>
                    <div class="form-group" style="padding-top: 10px">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image">
                        <img src="{{Storage::url($pizza->image)}}" width="80" alt="">
                    </div>
                    <div class="form-group text-center" style="padding-top: 20px">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                    
                </div>
                </form>
            </div>
        </div>
        
    </div>

</div>
@endsection
