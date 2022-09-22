<?php

namespace App\Http\Controllers;

use App\Models\Skije;
use Illuminate\Http\Request;

class TypeSkijeController extends Controller
{
      public function index($type_id)
    {
        $skije=Skije::get()->where('type_id', $type_id);
        if(is_null($skije))
        return response()->json('Data not found',404);
        return response()->json($skije);
    }
}
