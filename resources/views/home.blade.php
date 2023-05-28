@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
              </nav>
            <div class="card">
                <div class="card-header">{{ __('Your Orders') }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">User</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date/Time</th>
                            <th scope="col">Pizza</th>
                            <th scope="col">small pizza</th>
                            <th scope="col">med pizza</th>
                            <th scope="col">large pizza</th>
                            <th scope="col">Total (£)</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                          <tr>
                            <td>{{$order->user->name}}</th>
                            <td>{{$order->user->email}}</td>
                            <td>{{$order->date}} {{$order->time}}</td>
                            <td>{{$order->pizza->name}}</td>
                            <td>{{$order->small_pizza}}</td>
                            <td>{{$order->medium_pizza}}</td>
                            <td>{{$order->large_pizza}}</td>
                            <td>£{{($order->pizza->small_price * $order->small_pizza) + ($order->pizza->medium_price * $order->medium_pizza) + ($order->pizza->large_price * $order->large_pizza) }}</td>
                            <td>{{$order->status}}</td>
                          </tr>
                            @endforeach
                        </tbody>
                      </table> 

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
