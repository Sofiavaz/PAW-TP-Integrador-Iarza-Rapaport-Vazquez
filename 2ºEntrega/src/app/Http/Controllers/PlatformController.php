<?php

namespace App\Http\Controllers;

use App\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    //

    public function all(){
        return Platform::all()->toJson();
    }
}
