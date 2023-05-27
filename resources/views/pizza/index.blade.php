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
                        <a href="" class="list-group-item list-group-item-action">View</a>
                        <a href="" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
        </div>

        {{-- pizza form  --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pizza') }}</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name of pizza</label>
                        <input type="text" class="form-control" name="name" placeholder="name of pizza">
                    </div>
                    <div class="form-group">
                        <label for="description">Description of pizza</label>
                        <textarea class="form-control" name="description" placeholder="Describe the pizza here"></textarea>
                    </div>
                    <div class="form-inline">
                        <label for="price">Pizza Price (£)</label>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="small pizza price">
                            <input type="number" class="form-control" placeholder="medium pizza price">
                            <input type="number" class="form-control" placeholder="large pizza price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category">Category of pizza</label>
                        <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="vegetarian">vegetarian</option>          
                            <option value="non-vegetarian">non-vegetarian</option>
                            <option value="traditional">traditional</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
