@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Order') }}</div>
                <div class="card-body">
                    @if (Auth::check())

                    <form action="{{route('order.store')}}" method="post">@csrf
                        <div class="form-group">
                            <p>Name: {{auth()->user()->name}}</p>
                            <p>Email: {{auth()->user()->email}}</p>
                            <p>Small Pizza:<input type="number" class="form-control" name="small_pizza" value="0" ></p>
                            <p>Medium Pizza<input type="number" class="form-control" name="medium_pizza" value="0" ></p>
                            <p>Large pizza<input type="number" class="form-control" name="large_pizza" value="0" ></p>
                            <p><input type="hidden" name="pizza_id" value="{{$pizza->id}}"></p>
                            <p>Date<input type="date" name="date" class="form-control"required></p>
                            <p>Time<input type="time" name="time" class="form-control" required></p>
                            <p>Customization<textarea name="message" class="form-control" id="" cols="30" rows="10"required></textarea></p>
                            <p>
                                <button class="btn" type="submit">Place Order</button>
                            </p>
                            @if(session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{session('message')}}
                                </div>

                            @endif
                            @if(session('errmessage'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('errmessage')}}
                                </div>

                            @endif
                        </div>
                    </form>

                    @else
                    <p><a href="/login">please login to make an order</a></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pizza') }}</div>
                <div class="card-body">
                    <div class="row">
                            <img src="{{Storage::url($pizza->image)}}" class="img-thumbnail" style="width: 50%" alt="">
                            <p><h3>{{$pizza->name}}</h3></p>
                            <p><h5>{{$pizza->description}}</h3></p>
                        
                            <ul class="list-group col-md-8">
                                <a href="" class="list-group-item list-group-item-action">Order a small pizza: £{{$pizza->small_price}}</a>
                                <a href="" class="list-group-item list-group-item-action">Order a medium pizza: £{{$pizza->medium_price}}</a>
                                <a href="" class="list-group-item list-group-item-action">Order a large pizza: £{{$pizza->large_price}}</a>
                            </ul>              
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a.list-group-item{
        font-size: 18px
    }

    a.list-group-item:hover{
        transition: 0.3s;
        background-color: #41b3a3;
        color: #fff;

    }

    .card-header{
        background-color: #41b3a3;
        color: #fff;
        font-size: 20px;
    }

    .btn{
        background-color: #41b3a3;
    }
</style>
@endsection
