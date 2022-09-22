<?php

namespace App\Http\Controllers;

use App\Models\Skije;
use Illuminate\Http\Request;

class UserSkijeController extends Controller
{
    public function index($user_id)
    {
        $skije=Skije::get()->where('user_id', $user_id);
        if(is_null($skije))
        return response()->json('Data not found',404);
        return response()->json($skije);
    }
}
