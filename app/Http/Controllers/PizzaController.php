<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PizzaStoreRequest;
use App\Models\Pizza;
use App\Http\Requests\PizzaUpdateRequest;
class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::paginate(4);
        
        
        //return the pizza view


        return view('pizza.index',compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PizzaStoreRequest $request)
    {
        //
        
        $path = $request->image->store('public/pizza');

        Pizza::create([
            'name' => $request->name,
            'description' => $request->description,
            'small_price' => $request->small_price,
            'medium_price' => $request->medium_price,
            'large_price' => $request->large_price,
            'category' => $request->category,
            'image' => $path,
        ]);

        return redirect()->route('pizza.index')->with('message', 'Pizza Successfully Created');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pizza = Pizza::find($id);
        return view('pizza.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PizzaUpdateRequest $request, string $id)
    {
        //
        $pizza = Pizza::find($id);
        if($request->has('image')){
            $path = $request->image->store('public/pizza');
        }else{
            $path = $pizza->image;
        }
        $pizza = new Pizza;
        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->small_price = $request->small_price;
        $pizza->medium_price = $request->medium_price;
        $pizza->large_price = $request->large_price;
        $pizza->category = $request->category;
        $pizza->image = $path;
        $pizza->save();
        return redirect()->route('pizza.index')->with('message', 'Pizza Successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
