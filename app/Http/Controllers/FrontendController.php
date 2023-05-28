<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Order;

class FrontendController extends Controller
{
    public function index(){
        $pizzas = Pizza::latest()->get();
        return view('frontpage',compact('pizzas'));
    }

    public function show($id){
        $pizza = Pizza::find($id);
        return view('show', compact('pizza'));
    }

    public function store(Request $request){
        if($request->small_pizza <= 0 && $request->medium_pizza <= 0 && $request->small_pizza <= 0){
            return back()->with('errmessage', 'please order at least one pizza'); 
        }

       

        Order::create([
            'time' => $request->time,
            'date' => $request->date,
            'user_id' => auth()->user()->id,
            'pizza_id' => $request->pizza_id,
            'small_pizza' => $request->small_pizza,
            'medium_pizza' => $request->medium_pizza,
            'large_pizza' => $request->large_pizza,
            'message' => $request->message,
        ]);

        return back()->with('message', 'Order Successfully placed'); 
    }
}
