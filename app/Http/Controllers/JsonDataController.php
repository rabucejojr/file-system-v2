<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class JsonDataController extends Controller
{
    //
    public function fetchData()
    {
        $jsonData = File::table('files')->select('FileFolder')->get();

        return response()->json($jsonData);
    }
}
