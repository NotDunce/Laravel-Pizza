@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">

        
        {{-- menu form --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{route('pizza.index')}}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{route('pizza.create')}}" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
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
        

        {{-- pizza form  --}}
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pizza') }}</div>
                <form action="{{route('pizza.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Pizza Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter the pizza">
                    </div>
                    <div class="form-group" style="padding-top: 10px">
                        <label for="description">Description of pizza</label>
                        <textarea class="form-control" name="description" placeholder="Describe the pizza here"></textarea>
                    </div>
                    <div class="form-inline" style="padding-top: 10px">
                        <label for="price">Pizza Price (£)</label>
                        <div class="input-group">
                            <input type="number" name="small_price" class="form-control" placeholder="small pizza price">
                            <input type="number" name="medium_price" class="form-control" placeholder="medium pizza price">
                            <input type="number" name="large_price" class="form-control" placeholder="large pizza price">
                        </div>
                    </div>
                    <div class="form-group" style="padding-top: 10px">
                        <label for="category">Category of pizza</label>
                        <select name="category" id="" class="form-control">
                            <option value="">select option...</option>
                            <option value="vegetarian">vegetarian</option>          
                            <option value="non-vegetarian">non-vegetarian</option>
                            <option value="traditional">traditional</option>
                        </select>
                    </div>
                    <div class="form-group" style="padding-top: 10px">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image">
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
