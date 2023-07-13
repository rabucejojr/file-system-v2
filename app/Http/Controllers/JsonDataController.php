<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonDataController extends Controller
{
    //
    public function fetchData(Request $request)
    {
        // filter value
        // $filterValue = $request->input('filter');

        // fetch json data from mysql
        $jsonData = DB::table('files')->select('FileFolder')->get();
        return response()->json($jsonData);
    }
}
