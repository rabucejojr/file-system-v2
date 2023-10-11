<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonDataController extends Controller
{
    public function fetchData(Request $request)
    {
        // fetch json data from mysql
        $jsonData = DB::table('files')->get()->pluck('FileFolder')->toArray();
        $countedCategories = collect($jsonData)->groupBy(function ($item) {
            return $item;
        })->map(function ($item) {
            return count($item);
        })->toArray();
        return response()->json($countedCategories);
    }
}
