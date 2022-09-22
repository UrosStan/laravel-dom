<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkijeCollection;
use App\Http\Resources\SkijeResource;
use App\Models\Skije;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SkijeContoller extends Controller
{
    
    public function index()
    {
    $skije=Skije::all();
    return new SkijeCollection($skije);
    }

    public function show(Skije $skije)
    {
       return new SkijeResource($skije);
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'price'=>'required',
            'type_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $skije=Skije::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'type_id'=>$request->type_id,
            'user_id'=>Auth::user()->id,
        ]);

        return response()->json(['Skije su uspesno kreirane.', new SkijeResource($skije)]);
    }

    public function update(Request $request, Skije $skije)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'price'=>'required',
            'type_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $skije->name=$request->name;
        $skije->description=$request->description;
        $skije->price=$request->price;
        $skije->type_id=$request->type_id;

        $skije->save();

        return response()->json(['Skije su uspesno apdejtovane.',new SkijeResource($skije)]);
    }

    public function destroy(Skije $skije)
    {
        $skije->delete();

        return response()->json('Skije su uspesno obrisane.');
    }




}
