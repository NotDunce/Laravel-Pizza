@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- menu form --}}
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{route('pizza.index')}}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{route('pizza.create')}}" class="list-group-item list-group-item-action">Create</a>
                        <a href="{{route('user.order')}}" class="list-group-item list-group-item-action">Menu</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('All Pizza') }}
                    <a href="{{route('pizza.create')}}"><button class="btn btn-success" style="float:right">Add pizza</button></a>
                </div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">S.price</th>
                            <th scope="col">M.price</th>
                            <th scope="col">L.price</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($pizzas)>0)
                            @foreach($pizzas as $key=> $pizza)
                          <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td><img src="{{Storage::url($pizza->image)}}" width="80" alt=""></td>
                            <td>{{$pizza->name}}</td>
                            <td>{{$pizza->description}}</td>
                            <td>{{$pizza->category}}</td>
                            <td>{{$pizza->small_price}}</td>
                            <td>{{$pizza->medium_price}}</td>
                            <td>{{$pizza->large_price}}</td>
                            <td><a href="{{route('pizza.edit',$pizza->id)}}"><button class="btn btn-primary">Edit</button></a></td>
                            <td><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$pizza->id}}">Delete</button></td>
                            <!-- Modal -->
                         <div class="modal fade" id="exampleModal{{$pizza->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                Are you sure that you'd like to delete this pizza?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        </tr>
                         
                            @endforeach
                            @else 
                            <p>no pizza to show here...</p>
                            @endif
                        </tbody>
                    </table>
                    {{$pizzas->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
